<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Car::count() == 0){

            Car::insert([

                [
                    'name' => 'i20',

                   	'manu_id' => 1,
                    
                ],
                [
                    'name' => 'i10',

                    'manu_id' => 2,
                    
                ],
                [
                    'name' => 'Venu',

                    'manu_id' => 3,
              
                ]

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
