<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daysworked extends Model
{
    use HasFactory;
    public function controlerregesters (){
        return $this->hasMany(controlerregester::class,'id','idControler');
    }
}
