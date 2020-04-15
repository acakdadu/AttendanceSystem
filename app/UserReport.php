<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{

    protected $table = 'tr_employee_reporting';
    protected $primaryKey = 'emp_id';
    protected $guarded = [''];


    public function User()
    {
        return $this->belongsTo(User::class, 'emp_id', 'emp_id');
    }
}
