<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function drug(){
        return $this->hasMany('App\Models\Drug');
    }
    public function rumour(){
        return $this->hasMany('App\Models\Rumour');
    }
    public function analysis(){
        return $this->hasMany('App\Models\analysis');
    }
}
