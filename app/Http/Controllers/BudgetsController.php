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
class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //List all budgets here
	$user = Auth::user();
	$budgets = \App\Budget::where('departmentid', '=', $user->departmentid)->where('startdate', '=', Config::get('Globals.startdate'))->get();
	return view('budgets.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        //Create a new budget line
	$budgetForm = $formBuilder->create('\App\Forms\BudgetForm', [
	'method'=>"POST",
	'url'=>route('budgets.store')
	]);
	return view('budgets.create', compact('budgetForm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateBudgetRequest $request, FormBuilder $formBuilder)
    {
        //
	\App\Budget::create(Request::all());
	return redirect('budgets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
	
	$department=DB::table('budgets')->where('id', '=', $id)->get(); 
	#var_dump($department);
	$department=$department[0]->departmentid;
        $budgets = \App\Budget::where('departmentid', '=', $department)->get();
	var_dump(sizeof($budgets));
	#var_dump($department);
	#var_dump($budgets);
	return view('budgets/show', compact('budgets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
	$model = \App\Budget::find($id);
        $budgetForm = $formBuilder->create('\App\Forms\BudgetForm', [
        'method'=>"PUT",
        'url'=>'budgets/'.$id,
	'model'=>$model
        ]);
	#var_dump($budgetForm);
        return view('budgets.edit', compact('budgetForm'));

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
	$budget = \App\Budget::findOrFail($id);
	$budget->update($request->all());
	return redirect('budgets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        \App\Budget::destroy($id);
	return redirect('budgets');
    }
}
