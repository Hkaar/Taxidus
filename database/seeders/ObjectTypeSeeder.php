<?php

namespace Database\Seeders;

use App\Models\ObjectType;
use Illuminate\Database\Seeder;

class ObjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['default', 'item', 'weapon', 'tool', 'consumable', 'story'];

        foreach ($types as $type) {
            if (! ObjectType::strictByName($type)->first()) {
                ObjectType::create([
                    'name' => $type,
                ]);
            }
        }
    }
}
