<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'mst_employee';
    protected $primaryKey = 'emp_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $guarded = '';

    protected $fillable = [
        'emp_id', 'password', 'name', 'company', 'department', 'team', 'level'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level()
    {
        $memlevel = $this->level;
        if ($memlevel == '0') {
            return 'TEAM MEMBER 0';
        } elseif ($memlevel == '1') {
            return 'TEAM MEMBER 1';
        } else {
            return 'TEAM MEMBER 2';
        }
    }

    public function Family()
    {
        return $this->hasMany(Family::class, 'emp_id', 'emp_id');
    }

    public function FamilyReport()
    {
        return $this->hasMany(FamilyReport::class, 'emp_id', 'emp_id');
    }

    public function UserReport()
    {
        return $this->hasMany(UserReport::class, 'emp_id', 'emp_id');
    }
}
