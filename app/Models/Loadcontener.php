<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loadcontener extends Model
{
    use HasFactory;

    protected $table = 'loadconteners';

    public function driver(Type $var = null)
    {
     
        return $this->belongsTo(driver::class);
    }

    public function Jobdelivered(Type $var = null)
    {
     
        return $this->belongsTo(Jobdelivered::class);
    }
  
}
