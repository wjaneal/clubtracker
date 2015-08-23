<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BudgetForm extends Form
{
    public function buildForm()
    {
	$departments = [''=>'Select a Department', 0=>'Marketing', 1=>'Academic'];
        $this
            ->add('category', 'text')
            ->add('subcategory', 'text')
            ->add('amount', 'text')
            ->add('startdate', 'text')
            ->add('departmentid', 'select', [
		'choices'=>$departments,
		'label'=>'Department ID'
		])
    	    ->add('save', 'submit', ['label' => 'Submit Budget']);
    }
}
