<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Manufacture;

class ManufacureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(Manufacture::count() == 0){

            Manufacture::insert([

                [
                    'name' => 'Maruti',
                    
                ],
                [
                    'name' => 'Hyundai',
                    
                ],
                [
                    'name' => 'Honda',
              
                ]

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
