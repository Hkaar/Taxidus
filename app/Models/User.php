<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'bio',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define the relationship with session players
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    /**
     * Checks to see if the current user has the give permission
     *
     * @param  int|\App\Enums\RoleEnum|array<int, \App\Enums\RoleEnum|int>  $role
     */
    public function hasPermission(int|RoleEnum|array $roles): bool
    {
        if (! is_array($roles)) {
            $roles = [$roles];
        }

        $roleIds = array_map(function ($role) {
            return $role instanceof RoleEnum ? $role->value : $role;
        }, $roles);

        return $this->roles()->whereIn('roles.id', $roleIds)->exists();
    }

    /**
     * Attaches a permission role to the current user
     */
    public function attachPermission(int|RoleEnum $role): bool
    {
        $roleId = $role instanceof RoleEnum ? $role->value : $role;
        $role = Role::find($roleId);

        if (! $role) {
            Log::error("Invalid role was given to be attached:\n
                Username: {$this->username}\n
                Given argument: {$roleId}"
            );

            return false;
        }

        assert($role instanceof Role, "Unexpected instance was detected of {$role} instead of Role!");

        $this->roles()->attach($role->id);

        return true;
    }

    /**
     * Detaches a permission role from the current user
     */
    public function detachPermission(int|RoleEnum $role): bool
    {
        $roleId = $role instanceof RoleEnum ? $role->value : $role;
        $role = Role::find($roleId);

        if (! $role) {
            Log::error("Invalid role was given to be attached:\n
                Username: {$this->username}\n
                Given argument: {$roleId}"
            );

            return false;
        }

        $exists = $this->hasPermission($roleId);

        if (! $exists) {
            Log::error("User doesn't have the relevant permission of {$role->name} to be removed!");

            return false;
        }

        $this->roles()->detach($role->id);

        return true;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
