<?php

namespace Database\Seeders;

use App\Models\SessionRole;
use Illuminate\Database\Seeder;

class SessionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['default', 'moderator', 'admin'];

        foreach ($roles as $role) {
            if (! SessionRole::strictByName($role)->first()) {
                SessionRole::create([
                    'name' => $role,
                ]);
            }
        }
    }
}
