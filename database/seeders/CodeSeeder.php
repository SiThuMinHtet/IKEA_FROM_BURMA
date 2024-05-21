<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void


    {

        $data = [
            [
                'name' => "BD -",

            ],

            [
                'name' => "LMP -",

            ],

            [
                'name' => "TAB -",
            ],

            [
                'name' => "SOF -",
            ],

            [
                'name' => "CAB -",
            ],

        ];
        DB::table('codes')->insert($data);
    }
}
