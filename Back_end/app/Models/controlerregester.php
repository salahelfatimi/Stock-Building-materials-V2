<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class controlerregester extends Model
{
    use HasFactory;
    public function daysworked (){
        return $this->hasMany(daysworked::class,'idControler','id');
    }
}
