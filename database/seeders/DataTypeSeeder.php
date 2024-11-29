<?php

namespace Database\Seeders;

use App\Models\DataType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataTypes = ['int', 'string', 'float'];

        foreach ($dataTypes as $dataType) {
            if (!DataType::strictByName($dataType)->first()) {
                DataType::create([
                    'name'=> $dataType,
                ]);
            }
        }
    }
}
