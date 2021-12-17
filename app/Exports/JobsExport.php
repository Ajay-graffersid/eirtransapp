<?php

namespace App\Exports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class JobsExport implements FromCollection
class JobsExport implements FromQuery, WithHeadings
{
    //use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Job::all();
    // }

    public function query()
    {
        return Job::query()->where('status',0);
    }

    public function headings(): array
    {
        return ["id","user_id ", "lane_id ", "job_number","make_model",
        "reg","location","collection_address","delivery_address","booking_date",
        "vin_number","relese_code","commcode","weight","curr","eori","value","shipimo","eta",
        "bill_of_laden","description","rate","inv_ref","inv_file"];
    }


   

   
}
