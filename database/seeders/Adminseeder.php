<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staffs')->insert(
            [
                'name' => 'Si Thu',
                'email' => 'sithu@gmail.com',
                'address' => 'apple street',
                'age' => 26,
                'phone' => '09799591564',
                'role_id' => 1,
                'password' => bcrypt('123456'),
                'image' => '-',
                'uuid' => Str::uuid()->toString(),
                'status' => 'Active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }
}
