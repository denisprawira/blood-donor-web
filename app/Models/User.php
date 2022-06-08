<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    //=========================================//
    //           one to many : has to          //
    //=========================================//
    public function requestedEvents(){
        return $this->hasMany(Event::class,'id_user');
    }

    public function requestHelprequest(){
        return $this->hasMany(HelpRequest::class,'id_user');
    }

    public function donorHistories(){
        return $this->hasMany(DonorHistory::class,'id_user');
    }


    //=========================================//
    //   one to many relationship: belong to   //
    //=========================================//
    public function blood(){
        return $this->belongsTo(BloodType::class,'blood_type');
    }
    

    //=========================================//
    // many to many relationship: belong to    //
    //=========================================//
    public function joinedEvents(){
        return $this->belongsToMany(Event::class, 'detail_events','id_user','id_event');
    }

    public function joinedHelpRequests(){
        return $this->belongsToMany(HelpRequest::class, 'detail_help_requests','id_user','id_request');
    }    

    public function userHasPmi(){
        return $this->belongsToMany(Pmi::class, 'detail_user_pmi','id_user','id_pmi');
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',  
        'phone',        
        'address',      
        'blood_type',   
        'img',         
        'token',
        'roles',
        'status'     


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
