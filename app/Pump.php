<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    protected $fillable = ['onHour','onMin','offHour','offMin'];
}
