<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $table = 'pets';
    protected $dates = [
        'updated_at',
        'created_at'
    ];
    protected $fillable = [
        'name',
        'type'
    ];
}
