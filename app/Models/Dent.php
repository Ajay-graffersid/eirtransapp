<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dent extends Model
{
    use HasFactory;
    public function job(Type $var = null)
    {
        return $this->belongsTo(job::class);
    }

     public function driver(Type $var = null)
    {
     
        return $this->belongsTo(driver::class);
    }

    public function user(Type $var = null)
    {
        return $this->belongsTo(User::class);
    }

    public function loadcontener(Type $var = null)
    {
        return $this->belongsTo(Loadcontener::class);
    }
}
