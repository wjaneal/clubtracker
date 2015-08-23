<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Auth;
use Config;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Config\Repository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    $students = \App\Student::all()->sortBy('sfname')->sortBy('slname');
    return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
    $studentForm = $formBuilder->create('\App\Forms\StudentForm', [
        'method'=>"POST",
        'url'=>route('students.store')
        ]);
    return view('students.create', compact('studentForm'));

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
        return redirect('students');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    $students = \App\Student::where('id','=',$id)->get();
    var_dump($id);
    var_dump($students);
    return view('students/show', compact('students'));

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
        $studentForm = $formBuilder->create('\App\Forms\StudentForm', [
        'method'=>"PUT",
        'url'=>'students/'.$id,
        'model'=>$model
        ]);
        return view('students.edit', compact('studentForm'));

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
      $student = \App\Student::findOrFail($id);
        $student->update($request->all());
        return redirect('students');

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
        return redirect('students');
    }

}
