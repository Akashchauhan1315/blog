<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\CarModel;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(CarModel::count() == 0){

            CarModel::insert([

                [
                    'name' => 'sports',

                   	'car_id' => 1,
                    
                ],
                [
                    'name' => 'sports1',

                    'car_id' => 2,
                    
                ],
                [
                    'name' => 'sports3',

                    'car_id' => 3,
              
                ]

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
