<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    public $timestamps = false;

    protected $table = 'mst_employee';
    protected $guarded = [''];
}
