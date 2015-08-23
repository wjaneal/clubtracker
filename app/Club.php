<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table='clubs';

    protected $fillable=[
	'name',
	'description',
	'teacherid'
	];

    public function users() #Actually, teachers
    {
    return $this->hasOne('\App\User');
    }
}
