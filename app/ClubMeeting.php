<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubMeeting extends Model
{
    //
    protected $table = 'clubmeetings';

    protected $fillable = [
	'clubid',
	'meetingdate',
	'start_time',
	'end_time'
	];

    public function clubs()
    {
    return $this->hasMany('\App\Club');
    }
}
