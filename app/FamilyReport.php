<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyReport extends Model
{
    protected $primaryKey = 'emp_id';
    protected $table = 'tr_family_member_reporting';
    protected $guarded = [''];

    public function User()
    {
        return $this->belongsTo(User::class, 'emp_id', 'emp_id');
    }

    public function Family()
    {
        return $this->belongsTo(Family::class, 'emp_id', 'emp_id');
    }
}
