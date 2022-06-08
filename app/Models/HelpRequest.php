<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_pmi', 
        'blood_type',  
        'description', 
        'patient_name', 
        'target', 
        'img', 
        'post_at', 
        'status', 
    ];
    
    //=========================================//
    //   one to many relationship: belong to   //
    //=========================================//
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function pmi(){
        return $this->belongsTo(Pmi::class,'id_pmi');
    }

    public function blood(){
        return $this->belongsTo(BloodType::class,'blood_type');
    }


    //=========================================//
    // many to many relationship: belong to    //
    //=========================================//
    public function users(){
        return $this->belongsToMany(User::class, 'detail_help_requests','id_request','id_user');
    }
    
}
