<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('customers')->insert(
            [
                'name' => 'Ma Ma',
                'email' => 'mama@gmail.com',
                'phone' => '09799591564',
                'address' => 'apple street',
                'joining_date' => Carbon::now(),
                'password' => bcrypt('123456'),
                'image' => '-',
                'uuid' => Str::uuid()->toString(),
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
