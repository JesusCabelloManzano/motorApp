<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehicleTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vehicle_types')->delete();
        
        \DB::table('vehicle_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Coche',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Moto',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Off-Road',
            ),
        ));
        
        
    }
}