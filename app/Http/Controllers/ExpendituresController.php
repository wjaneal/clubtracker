<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

class ExpendituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    $user = Auth::user();
    $startdate = strtotime(Config::get('Globals.startdate'));
    $month = date("m", $startdate);
    $day = date("d", $startdate);
    $year = intval(date("Y", $startdate));
    $AddOneYear = mktime(0,0,0,$month, $day, $year+1);
    $subcategories = DB::table('budgets')->select('subcategory')->where('departmentid', '=', $user->departmentid)->where('startdate', '=', Config::get('Globals.startdate'))->get();

                $subcategory_options = array();
                #Make a list of budget subcategories
                foreach($subcategories as $subcategory){
                        $subcategory_options[$subcategory->subcategory] = $subcategory->subcategory;
                }
                        $expenditures=DB::table('expenditures')->where('departmentid', "=", $user->departmentid)->where('date','>=', Config::get('Globals.startdate'))->get();
                        $budget = DB::table('budgets')
				->where('departmentid','=',$user->departmentid)
				->where('startdate', '>=', Config::get('Globals.startdate'))
				->where('startdate', '<', date("Y-m-d", $AddOneYear))
				->get();
                        #Total each subcategory expenditure
                        $subcategory_totals = DB::table('expenditures')->select('subcategory', DB::raw('SUM(amount) as sum1'))->groupBy('subcategory')->get();
                        $total = 0;
                        $total_spent = 0;
                        foreach($budget as $item){
                                $total+=(float)($item->amount);
                                }
                        foreach($expenditures as $expenditure){
                                $total_spent += (float)($expenditure->amount);
                        }
                        return view('expenditures.index')->with('expenditures',$expenditures)->with('subcategory_options', $subcategory_options)->with('budget', $budget)->with('subcategory_totals', $subcategory_totals)->with('total', $total)->with('total_spent', $total_spent);


        /*$expenditures = \App\Expenditure::all();
        return view('expenditures.index', compact('expenditures'));*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Formbuilder $formBuilder)
    {
  	  $departmentid = Auth::user()->departmentid;
          $expenditureForm = $formBuilder->create('\App\Forms\ExpenditureForm', [
        'method'=>"POST",
        'url'=>route('expenditures.store')
        ]);
        return view('expenditures.create', compact('expenditureForm'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\CreateExpenditureRequest $request, FormBuilder $form)
    {
         \App\Expenditure::create(Request::all());
        return redirect('expenditures');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
         $department=DB::table('expenditures')->where('departmentid', '=', $id)->get(); 
        #var_dump($department);
        $department=$department[0]->departmentid;
        $expenditures = \App\Expenditure::where('departmentid', '=', $department)->get();
        return view('expenditures/show', compact('expenditures'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $model = \App\Expenditure::find($id);
        $expenditureForm = $formBuilder->create('\App\Forms\ExpenditureForm', [
        'method'=>"PUT",
        'url'=>'expenditures/'.$id,
        'model'=>$model
        ]);
        return view('expenditures.edit', compact('expenditureForm'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\CreateExpenditureRequest $request)
    {
        $expenditure = \App\Expenditure::findOrFail($id);
        $expenditure->update($request->all());
        return redirect('expenditures');

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
	return redirect('expenditures');
    }
}
