<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Config;
use Auth;
class ExpenditureForm extends Form
{
    public function buildForm()
    {
	$departmentid = Auth::user()->departmentid;
        $subcategories = \App\Budget::where('departmentid', '=', Auth::user()->departmentid)->where('startdate', '>=', Config::get('Globals.startdate'))->select('subcategory')->groupBy('subcategory')->get();
	$sc = [''=>'Select a Subcategory'];
	foreach($subcategories as $subcategory){
		#var_dump($subcategory->subcategory);
		$sc[$subcategory->subcategory] = $subcategory->subcategory;
		}
	$subcategories = $sc;
	#Later: Determine Department ID from Auth
	#Later: Combine Budget Categories Based on Current Year and Auth'd Department
        $this
	    ->add('subcategory', 'select',
                [
                'label'=>'Subcategory',
		'choices'=>$subcategories
                ])
            ->add('description', 'text')
	    ->add('departmentid', 'hidden',
		['value'=>$departmentid]
		)
            ->add('date', 'text')
            ->add('save', 'submit', ['label' => 'Submit Expenditure']);

    }
}
