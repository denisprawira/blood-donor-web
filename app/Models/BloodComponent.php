<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodComponent extends Model
{
    use HasFactory;
    protected $table = 'blood_components';
    public $timestamps = false;

    public function bloodStocks(){
        return $this->hasMany(BloodStock::class);
    }
}
