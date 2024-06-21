<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportSqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $path = database_path('sql/alunos_2024-04-19_19-52-37.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}