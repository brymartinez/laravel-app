<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date'
    ];
}
