<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pmi extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'pmi';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address', 
        'lat',  
        'lng',
        'img' 
    ];

    public function bloodStocks(){
        return $this->hasMany(BloodStock::class,'id_pmi');
    }

    public function events(){
        return $this->hasMany(Event::class,'id_pmi');
    }

    public function helpRequests(){
        return $this->hasMany(HelpRequest::class,'id_pmi');
    }

    public function pmiHasUsers(){
        return $this->belongsToMany(User::class, 'detail_user_pmi','id_pmi','id_user');
    }
}
