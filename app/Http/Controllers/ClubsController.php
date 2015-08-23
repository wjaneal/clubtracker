<?php

namespace App\Http\Controllers;

#use Illuminate\Http\Request;
use Request;
use DB;
use Auth;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Config\Repository;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
	$teacher = $user->name;
        $clubs = \App\Club::where('teacherid', '=', $user->id)->get();
        return view('clubs.index', compact('clubs', 'teacher'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $clubForm = $formBuilder->create('\App\Forms\ClubForm', [
        'method'=>"POST",
        'url'=>route('clubs.store')
        ]);
	$clubForm->add('save', 'submit', ['label' => 'Create New Club']);
        return view('clubs.create', compact('clubForm'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateClubRequest $request, FormBuilder $formBuilder)
    {
        \App\Club::create(Request::all());
        return redirect('clubs');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $club=\App\Club::find($id);
        return view('clubs/show', compact('club'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $model = \App\Club::find($id);
        $clubForm = $formBuilder->create('\App\Forms\ClubForm', [
        'method'=>"PUT",
        'url'=>'clubs/'.$id,
        'model'=>$model
        ]);
	$clubForm->add('save', 'submit', ['label' => 'Edit Club']);
        return view('clubs.edit', compact('clubForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\CreateBudgetRequest $request)
    {
        $club = \App\Club::findOrFail($id);
        $club->update($request->all());
        return redirect('clubs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
         \App\Club::destroy($id);
        return redirect('clubs');

    }
}
