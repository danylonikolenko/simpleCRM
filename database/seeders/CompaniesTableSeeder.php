<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [];
        $companies[] = [
          'title' => 'company',
          'description' => 'desc'
        ];

        for ($i =0; $i<10000; $i++){
            $title = 'company'.$i;
            $desc = 'desc'.$i;
            $companies[] = [
                'title' => $title,
                'description' =>  $desc
            ];
        }
        DB::table('companies')->insert($companies);
    }
}
