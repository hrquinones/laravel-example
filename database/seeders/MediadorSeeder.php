<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MediadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mediador')->truncate();

        DB::table('mediador')->insert
        (
            [
                'id' => Str::uuid(),     
                'first_name' => 'Carlos',
                'last_name' => 'Rey',
                'dt_birth' => date('Y-m-d',strtotime('1985-10-15')),
                'sex' => 'male',
                'document_type' => 'DNI',
                'document_id' => '35000222',
                'distrito' => 'Capital',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s') 
            ]
        );

        DB::table('mediador')->insert
        (
            [
                'id' => Str::uuid(),     
                'first_name' => 'Lionel Andres',
                'last_name' => 'Messi',
                'dt_birth' => date('Y-m-d',strtotime('1987-06-24')),
                'sex' => 'male',
                'document_type' => 'DNI',
                'document_id' => '33016244',
                'distrito' => 'Capital',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s') 
            ]
        );


        DB::table('mediador')->insert
        (
            [
                'id' => Str::uuid(),     
                'first_name' => 'Diego Armando',
                'last_name' => 'Maradona',
                'dt_birth' => date('Y-m-d',strtotime('1960-10-30')),
                'sex' => 'male',
                'document_type' => 'DNI',
                'document_id' => '14276579',
                'distrito' => 'Capital',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s') 
            ]
        );
       


    }
}
