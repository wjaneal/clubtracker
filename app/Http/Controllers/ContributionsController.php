<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContributionsController extends Controller
{
 
   //
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		return \App\Contribution::all();
	}




	public function create(){
		$contributions = \App\Contribution::lists('subject', 'contribution', 'id');
		return view('contributions.create')->with('contributions');
		}




	public function confirm(Requests\PrepareContributionRequest $request, \Illuminate\Contracts\Auth\Guard $auth){
		$data = $request->all()+[
		'name' => $auth->user()->name,
		'email'=> $auth->user()->email,
		];
		session()->flash('contribution_data', $data);
		return view('contributions.confirm', compact('data'));				
	}
/*
**
**
**
*/



	public function store()
	{
	$data = session()->get('contribution_data');
	\App\Contribution::open($data)->save();
	session()->flash('flash_message', "Your contribution has been saved. Thank you.");
	return redirect('contributions');	
	}
}
