<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyReport extends Model
{
    protected $primaryKey = 'family_id';
    protected $table = 'tr_family_member_reporting';
    protected $guarded = [''];

    protected $hidden = ['family_id', 'created_at', 'updated_at'];

    public function Family()
    {
        return $this->belongsTo(Family::class, 'id');
    }
}
