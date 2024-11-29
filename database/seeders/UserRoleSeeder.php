<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['member', 'moderator', 'operator', 'admin'];

        foreach ($roles as $role) {
            if (! Role::strictByName($role)->first()) {
                Role::create([
                    'name'=> $role,
                ]);
            }
        }
    }
}
