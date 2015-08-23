<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Config;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Config\Repository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    $clubdata = \App\Club::all()->toArray();
    $clubmeetingdata = \App\ClubMeeting::all()->toArray();
    
    $studentdata = \App\Student::all()->toArray();
    $clubs = array();
    foreach($clubdata as $cd){
	$clubs[$cd['id']] = $cd['name'];
	}
    $students = array();
    foreach($studentdata as $sd){
	$students[$sd['id']] = $sd['slname'].', '.$sd['sfname'];
	}
    $clubmeetings = array();
    $dates = array();
    foreach($clubmeetingdata as $cmd){
	$clubmeetings[$cmd['id']] = $cmd['clubid'];
   	$dates[$cmd['id']] = $cmd['meetingdate'];
	}
    $attendance = \App\Attendance::all()->toArray();
    var_dump($dates);
    var_dump($clubmeetings);
    var_dump($clubmeetingdata);
    var_dump($attendance); 
    return view('attendance.index', compact('attendance','students','clubmeetings','clubs', 'dates'));
    }

    /**
     * Show the form for creating a new resource.
     * return view('attendance.index', compact('attendance'));
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
    $attendanceForm = $formBuilder->create('\App\Forms\StudentForm', [
        'method'=>"POST",
        'url'=>route('attendance.store')
        ]);
    return view('attendance.create', compact('attendanceForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateStudentRequest $request, FormBuilder $formBuilder)
    {
     \App\Student::create(Request::all());
        return redirect('attendance');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    $attendance = \App\Student::find($id);
    return view('attendance/show', compact('attendance'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
     $model = \App\Student::find($id);
     $attendanceForm = $formBuilder->create('\App\Forms\StudentForm', [
        'method'=>"PUT",
        'url'=>'attendance/'.$id,
        'model'=>$model
        ]);
     return view('attendance.edit', compact('attendanceForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\CreateStudentRequest $request)
    {
    $attendance = \App\Student::findOrFail($id);
    $attendance->update($request->all());
    return redirect('attendance');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
     \App\Student::destroy($id);
        return redirect('attendance');

    }
    public function selectclub()
    {
    $userid=Auth::user()->id;
    $clubdata = \App\Club::all();
		#where('teacherid', "=", $userid);
    $clubs = array();
    foreach($clubdata as $cd){
        $clubs[$cd->id] = $cd->name;
        }
    return view('attendance/selectclub', compact('clubs'));
    }

    public function enterattendance(Request $request)
    {
    $id = $request->clubid;
    $enrolments = \App\Enrolment::where('clubid','=',$id)->get();
    $enrolmentdata = array();
    foreach($enrolments as $e){
	array_push($enrolmentdata, $e['id']);
	}
    $enrolments = DB::table('enrolment')
	->where('clubid', '=', $id)
	->join('students', 'students.id', '=', 'enrolment.studentid')
	->join('clubs', 'clubs.id', '=', 'enrolment.clubid')
	->select('enrolment.id', 'students.id as studentid', 'students.slname', 'students.sfname', 'students.snname','clubs.name')
	->get();
    $date = '2015-08-23';
    $clubmeetings = DB::table('clubmeetings')->where('clubid','=',$id)->where('meetingdate','=', $date)->get();
    $entries = ['P'=>'Present', 'A'=>'Absent'];   
    $date = date('D-M-Y', time());
var_dump($clubmeetings[0]->id);
    $clubmeetingid=$clubmeetings[0]->id;
        return view('attendance.enterattendance', compact('enrolments', 'date', 'entries', 'clubmeetingid'));
    }

    public function submitmultiple(Request $request)
    {
    var_dump($request['entry']);
    var_dump($request['studentid']);
       $date = $request['date'];
       foreach($request['entry'] as $key=>$value)
                {
                $entry = new \App\Attendance;
		$entry->clubmeetingid = $request['clubmeetingid'];
		$entry->studentid = $request['studentid'][$key];
		$entry->entry = $value;
                $entry->save();
                }
       #return redirect('attendance');

    }
}
