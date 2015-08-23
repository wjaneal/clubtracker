<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
	'studentid',
	'clubmeetingid',
	'entry'
	];

    public function students()
    {
    return $this->hasMany('App\Student');
    }

    public function clubmeetings()
    {
    return $this->hasMany('App\ClubMeeting');
    }
}
