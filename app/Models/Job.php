<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'lane_id',
        'job_number',
        'make_model',
        'reg',
        'location',
        'collection_address',
        'delivery_address',
        'booking_date',
        'vin_number',
        'relese_code',
        'commcode',
        'weight',
        'curr',
        'eori',
        'value',
        'shipimo',
        'eta',
        'bill_of_laden',
        'description',
        'rate',
        'inv_ref',
    ];

    public function lane(Type $var = null)
    {
        return $this->belongsTo(Lane::class);
    }

    public function user(Type $var = null)
    {
        return $this->belongsTo(User::class);
    }

    public function invoice(Type $var = null)
    {
        return $this->hasOne(Invoice::class);
    }
}
