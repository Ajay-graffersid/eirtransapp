<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morningtruckaccept extends Model
{
    use HasFactory;

    public function driver(Type $var = null)
    {
     
        return $this->belongsTo(driver::class);
    }

}
