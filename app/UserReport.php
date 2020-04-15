<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{

    protected $table='tr_employee_reporting';
    protected $guarded='';

    public function User()
    {
    return $this->belongsTo('App\User','emp_id','emp_id');
    }

}
