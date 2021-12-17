<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'name' => 'Driver1',
            'driver_status' => '0',
            'token' => '0',
            'ip' => '0',
            'deviceid' => '0',
            'type' => '0',
            'pincode' => '482001',
            'mobile' => '1234567890',
          
        ]);

        Driver::create([
            'name' => 'Driver2',
            'driver_status' => '0',
            'token' => '0',
            'ip' => '0',
            'deviceid' => '0',
            'type' => '0',
            'pincode' => '482002',
            'mobile' => '0987654321',
          
        ]);

        Driver::create([
            'name' => 'Driver3',
            'driver_status' => '0',
            'token' => '0',
            'ip' => '0',
            'deviceid' => '0',
            'type' => '0',
            'pincode' => '482003',
            'mobile' => '1234554321',          
        ]);


        Driver::create([
            'name' => 'Driver4',
            'driver_status' => '0',
            'token' => '0',
            'ip' => '0',
            'deviceid' => '0',
            'type' => '0',
            'pincode' => '482004',
            'mobile' => '6789009876',          
        ]);


    }
}
