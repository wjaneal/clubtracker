<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
#use Illuminate\Config\Repository;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    $enrolment = \App\Enrolment::all();
    $studentdata = \App\Student::all();
    $clubdata = \App\Club::all();
    $students = [];
    $clubs = [];
    foreach($clubdata as $cd){
	$clubs[$cd->id] = $cd->name;
    }
    foreach($studentdata as $sd){
	$students[$sd->id] = $sd->slname.', '.$sd->sfname;
    }
    return view('enrolment.index', compact('enrolment','students','clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
    $enrolmentForm = $formBuilder->create('\App\Forms\EnrolmentForm', [
    'method'=>"POST",
    'url'=>route('enrolment.store')
    ]);
    return view('enrolment.create', compact('enrolmentForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateEnrolmentRequest $request, FormBuilder $formBuilder)
    {
     \App\Enrolment::create(Request::all());
        return redirect('enrolment');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    $enrolment = \App\Enrolment::find($id);
    $studentdata = \App\Student::all();
    $clubdata = \App\Club::all();
    $students = [];
    $clubs = [];
    foreach($clubdata as $cd){
        $clubs[$cd->id] = $cd->name;
    }
    foreach($studentdata as $sd){
        $students[$sd->id] = $sd->slname.', '.$sd->sfname;
    }

    return view('enrolment/show', compact('enrolment','clubs','students'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
    $model = \App\Enrolment::find($id);
    $enrolmentForm = $formBuilder->create('\App\Forms\EnrolmentForm', [
    'method'=>"PUT",
    'url'=>'enrolment/'.$id,
    'model'=>$model
    ]);
    return view('enrolment.edit', compact('enrolmentForm','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\CreateEnrolmentRequest $request)
    {
    $enrolment = \App\Enrolment::findOrFail($id);
    $enrolment->update($request->all());
    return redirect('enrolment');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       \App\Enrolment::destroy($id);
        return redirect('enrolment');
    }
  public function selectstudents()
    {
    $students = \App\Student::all()->sortBy('sfname')->sortBy('slname');
    $clubdata = \App\Club::all()->sortBy('name');
    $clubs = [];
    foreach($clubdata as $cd){
        $clubs[$cd->id]=$cd->name;
        }
    return view('enrolment.selectstudents', compact('students', 'clubs'));

    }


    public function submitenrolments(Request $request)
    {
    
    var_dump($request);
    #var_dump($request['clubid']);
    foreach($request['studentid'] as $studentid)
        {
        $enrolment = new \App\Enrolment;
        $enrolment->clubid = $request['clubid'][0];
        $enrolment->studentid = $studentid;
        var_dump($studentid);
	$enrolment->save();
        }
    return redirect('enrolment');
    }

}
