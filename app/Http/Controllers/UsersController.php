<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = \App\User::all();
	return view('users.index', compact('users'));
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
   
    public function store(Requests\CreateUserUpdateRequest $request, FormBuilder $formBuilder)
    {
        //
        \App\User::create(Request::all());
        return redirect('users');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $users = \App\User::find($id)->get();
        return view('users/show', compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

  public function edit($id, FormBuilder $formBuilder)
    {
        $model = \App\User::find($id);
        $userDetailsForm = $formBuilder->create('\App\Forms\UserDetailsForm', [
        'method'=>"PUT",
        'url'=>'users/'.$id,
        'model'=>$model
        ]);
        return view('users.edit', compact('userDetailsForm'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\CreateUserUpdateRequest $request)
    {
        $user = \App\User::findOrFail($id);
        $user->update($request->all());
        return redirect('users');
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
}
