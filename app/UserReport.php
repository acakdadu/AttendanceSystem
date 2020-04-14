<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{

    protected $table='tr_employee_reporting';

    public function User()
    {
    return $this->belongsTo('App\User');
    }

}
