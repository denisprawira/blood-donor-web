<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function bloodStocks(){
        return $this->hasMany(BloodStock::class);
    }

    public function helpRequests(){
        return $this->hasMany(HelpRequest::class);
    }
    
}
