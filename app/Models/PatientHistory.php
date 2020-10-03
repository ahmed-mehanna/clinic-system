<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{
    use HasFactory;
    protected $fillable = ['Summary'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
