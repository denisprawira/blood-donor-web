<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodStock extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function components(){
        return $this->belongsTo(BloodComponent::class,'id_component');
    }

    public function bloodTypes(){
        return $this->belongsTo(BloodType::class,'blood_type');
    }

    public function pmis(){
        return $this->belongsTo(Pmi::class,'id_pmi');
    }
}
