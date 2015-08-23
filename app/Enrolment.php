<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{

    protected $table = 'enrolment';

    protected $fillable = [
	'clubid',
	'studentid'
	];

    public function scopeAttendance($id)
    {
    return $query->where('clubid', '=', $id);
    }

    public function clubs()
    {
    return $this->hasMany('App\Club');
    }    

    public function students()
    {
    return $this->hasMany('App\Student');
    }
}
