<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_pmi', 
        'title', 
        'institution', 
        'description', 
        'img', 
        'lat', 
        'lng', 
        'address', 
        'target', 
        'post_at', 
        'date_start', 
        'date_end', 
        'status',
        'message' 

    ];
    //many to many
    //belongsToMany parameter : belongsToMany(1,2,3,4)
    //1. model from another master table
    //2. pivot table
    //3. this table ID as foreign key in pivot table
    //4.  foreign key name of the model that you are joining to
    public function users(){
        return $this->belongsToMany(User::class, 'detail_events','id_event','id_user');
        //return $this->belongsToMany(User::class, 'detail_events','id_event','id_user');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function pmi(){
        return $this->belongsTo(Pmi::class,'id_pmi');
    }
}
