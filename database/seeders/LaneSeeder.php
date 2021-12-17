<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lane;

class LaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lane::create([
            'lane_type' => 'Dublin',
            'lane_number' => '1',
            'status' => '0',
          
        ]);

        Lane::create([
            'lane_type' => 'Carlow/Wexford',
            'lane_number' => '2',
            'status' => '0',
          
        ]);

        Lane::create([
            'lane_type' => 'Midlands/GALWAY',
            'lane_number' => '3',
            'status' => '0',
          
        ]);

      
    }
}
