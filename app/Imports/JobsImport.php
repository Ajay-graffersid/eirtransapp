<?php

namespace App\Imports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JobsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // echo '<pre>';print_r($row);die;
        return new Job([
            'id'    => $row['id'],
            'user_id'    => $row['user_id'], 
            'lane_id'    => $row['lane_id'], 
            'job_number'    => $row['job_number'], 
            'make_model'    => $row['make_model'], 
            'reg'    => $row['reg'], 
            'location'    => $row['location'], 
            'collection_address'    => $row['collection_address'],            
            'delivery_address'    => $row['delivery_address'], 
            'booking_date'    => $row['booking_date'], 
             'vin_number'    => $row['vin_number'], 
             'relese_code'    => $row['relese_code'],
             'commcode'    => $row['commcode'],
             'weight'    => $row['weight'],
             'curr'    => $row['curr'],
             'eori'    => $row['eori'],
             'value'    => $row['value'],
             'shipimo'    => $row['shipimo'],
             'eta'    => $row['eta'],
             'bill_of_laden'    => $row['bill_of_laden'],
             'description'    => $row['description'],
             'rate'    => $row['rate'],
             'inv_ref'    => $row['inv_ref']          
                    
          
            
        ]);
    }
}
