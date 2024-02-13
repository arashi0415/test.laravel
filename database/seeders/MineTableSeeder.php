<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mines')->truncate();
        $mines=[[
            'name'=>'樫村',
            'age'=>'27'
        ]];
        DB::table('mines')->insert($mines);
    }
}
