<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorHistory extends Model
{
    use HasFactory;
    protected $table = 'donor_histories';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_pmi',
        'blood_pressure',  
        'body_temperature',        
        'pulse',      
        'hemoglobin',   
        'date',         
        'location',
        'description',
        'history_type'     
    ];

    public function users(){
        return $this->belongsTo(User::class,'id_user');
    }

    
}
