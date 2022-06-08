<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailEventHistories extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "detail_event_histories";
}
