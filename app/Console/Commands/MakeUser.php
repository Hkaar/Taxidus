<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\Command;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {username?} {email?} {password?} {role?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     * 
     */
    public function handle()
    {
        $username = $this->argument('username')
            ?? $this->ask("What is the user's username?");

        $email = $this->argument("email")
            ?? $this->ask("What email is going to be used for {$username}?");

        $validator = Validator::make([
            'username' => $username,
            'email' => $email,
        ], [
            'username' => 'unique:users,username',
            'email' => 'unique:users,email',
        ]);

        if ($validator->fails()) {
            $this->error("\nUsername and/or email was already taken!");
            return 1;
        }

        $password = $this->argument("password")
            ?? $this->ask("What is the password for {$username}?");

        $roleName = $this->argument("role")
            ?? $this->ask("What role is going to be assigned to {$username}?");

        $role = Role::strictByName($roleName)->first();

        if (!$role) {
            $this->error("\nRole {$roleName} does not exist!, or did you perhaps forget to seed the db?");
            return 1;
        }

        $user = User::create([
            "username" => $username,
            "name" => $username,
            "email" => $email,
            "password" => $password,
        ]);

        $user->attachPermission($role->id);

        $this->info(
    "Generated User Profile\n" .
            "----------------------\n" .
            "Username\t: " . $username . "\n" .
            "Name\t\t: " . $username . "\n" .
            "Email\t\t: " . $email . "\n" .
            "Password\t: " . $password . "\n" .
            "Assigned role\t: " . $roleName . "\n"
        );

        return 0;
    }
}
