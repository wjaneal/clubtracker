<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
	"slname", 
	"sfname",
	"snname", 
	"gender",
	"country", 
	"email",
	"grade",
	];

    public function enrolment()
    {
    return $this->hasMany('App\Enrolment');
    }

    public function attendance()
    {
    return $this->hasMany('App\Attendance');
    }


}
