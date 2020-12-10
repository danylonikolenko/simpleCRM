<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{

    public function run()
    {
        $clients = [];
        $clients[] = [
            'name' => 'name',
            'contacts' => '+380999302216',
            'company'=> 1
        ];

        for ($i =0; $i<10000; $i++){
            $name = 'name'.$i;
            $contacts = '380'.$i;

            $comp = rand(1, 9999);

            $clients[] = [
                'name' => $name,
                'contacts' =>  $contacts,
                'company'=> $comp
            ];
        }
        DB::table('clients')->insert($clients);
    }

}
