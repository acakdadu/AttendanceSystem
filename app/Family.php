<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'mst_family_member';
    protected $primarykey = ['id', 'emp_id'];
    // protected $fillable = ['name', 'relation'];
    protected $guarded = [''];
    protected $hidden = [
        'emp_id', 'created_at', 'updated_at'
    ];


    public function User()
    {
        return $this->belongsTo(User::class, 'emp_id');
    }

    public function FamilyReport()
    {
        return $this->hasMany(FamilyReport::class, 'id');
    }
}
