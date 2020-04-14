<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyReport extends Model
{

    protected $table = 'tr_family_member_reporting';

    public function User()
    {
    return $this->belongsTo('App\User');
    }

    public function Family(){
        return $this->belongsTo('App\Family');
    }
}
