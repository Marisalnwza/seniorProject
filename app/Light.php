<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $fillable = ['onHour','onMin','offHour','offMin'];
}
