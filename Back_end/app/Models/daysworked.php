<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daysworked extends Model
{
    use HasFactory;
    public function controlerregesters (){
        return $this->belongsTo(controlerregester::class,'idControler','id');
    }
}
