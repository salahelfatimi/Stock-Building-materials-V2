<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chicklist extends Model
{
    use HasFactory;
    public function daysworkeds(){
        return $this->hasMany(daysworked::class,'idControler');
    }

}
