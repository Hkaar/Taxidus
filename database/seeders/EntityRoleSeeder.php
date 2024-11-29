<?php

namespace Database\Seeders;

use App\Models\EntityRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntityRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['default', 'uncommon', 'rare', 'boss', 'story-boss'];

        foreach ($roles as $role) {
            if (! EntityRole::strictByName($role)->first()) {
                EntityRole::create([
                    'name'=> $role,
                ]);
            }
        }
    }
}
