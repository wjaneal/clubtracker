<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClubMeetingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
	$user = Auth::user();
        $clubmeetings = \App\ClubMeeting::all();
	$clubdata = \App\Club::all();
	$clubs = array();
	foreach($clubdata as $cd){
		$clubs[$cd->id] = $cd->name;
		}
        return view('clubmeetings.index', compact('clubmeetings', 'clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        var_dump($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function selectmonth(){
	$clubdata = \App\Club::where('teacherid','=', Auth::user()->id)->get();
	$clubs = [];
	foreach($clubdata as $cd){
		$clubs[$cd->id] = $cd->name;
		}
	$baseyear = intval(Config::get('Globals.startdate'));
	if(date('Y', time()) > $baseyear){
		$baseyear+=1;
		}
	$months = array();
	$monthstext = [1=>'January', 2=>'February',3=>'March',4=>'April', 5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'];
	$currentmonth = date('m',time());
	for($i=0;$i<12;$i++){
		if($i+$currentmonth > 12){
			$months[$i+$currentmonth-12] = $monthstext[$i+$currentmonth-12];
			}
		else
			{
			$months[$i+$currentmonth] = $monthstext[$i + $currentmonth];
		}
	}
	$years = [$baseyear=>$baseyear, $baseyear+1=>$baseyear+1];
	return view('clubmeetings.selectmonth', compact('years', 'months','clubs'));

	}
    public function setmeetings(Request $request)
    {
	$hour_select = ['-'=>'-'];
	for($i=0;$i<24;$i++){
		$hour_select[$i] = $i.':00';
		}

	$year = $request['year'];
	$month = $request['month'];
	if(intval($month)<10){$month = '0'.$month;}
	$day = '01';
	$base_date = $year.'-'.$month.'-'.$day;
	var_dump($base_date);
	$day_of_week = date('w', strtotime($base_date));
	$day_of_month = date('d', strtotime($base_date));
	$day_offset = $day_of_month % 7;
	$first_day = date('w',strtotime($base_date));
	$days_in_month = date('t', strtotime($base_date));
	if($first_day < 0){
		$first_day+=7;
		}

	var_dump($day_offset);
	var_dump($first_day);
	$weeks = [];
	for($i=0; $i<6;$i++){
		$day = [];
		for($j=0; $j<7; $j++){
			if((7*$i+$j)>=$first_day && (7*$i+$j)<=7){
				$day[1+7*$i+$j] = 7*$i+$j+1-$first_day; 
				}
			elseif(7*$i+$j < 7){
				$day[1+7*$i+$j] = '-';
				}
			else{
				if((7*$i+$j+1 -$first_day) <= $days_in_month)
					$day[1+7*$i+$j] = 7*$i+$j +1 - $first_day;
				else{
					$day[1+7*$i+$j] = '-';
					}
				}
			}
		$weeks[$i] = $day;		
		}
	$month = date('m', time());
	$year = date('Y', time());
	$clubid = 1;
	$clubname = \App\Club::find(1)->name;
	return view('clubmeetings.setmeetings', compact('weeks','hour_select', 'month','year','clubid','clubname'));
    }

    public function storemany(Request $request)
	{
		$year = $request['year'];
		$month = $request['month'];
		foreach($request['meetingdate'] as $key=>$day)
			{
			$meeting = new \App\ClubMeeting;
			var_dump($year, $month, $day, $request['start_time'][$day], $request['end_time'][$day]);
			$meeting->meetingdate = $year.'-'.$month.'-'.$day;
			$meeting->clubid = $request['clubid'];
			$meeting->start_time = $request['start_time'][$day-1];
			$meeting->end_time= $request['end_time'][$day-1];
			$meeting->save();
			}
		return redirect('clubmeetings');
	}

}
