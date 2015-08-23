<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserDetailsForm extends Form
{
    public function buildForm()
    {
	$departments=[''=>'Select a Department', 0=>'Marketing', 1=>'Academic'];
	$usertypes=[''=>'Select a User Role',0=>'Administrator',1=>'Staff'];
        $this
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('departmentid', 'select',[
		'choices'=>$departments,
		'label'=>'Select a Department'
		])
	    ->add('type','select',[
		'choices'=>$usertypes,
		'label'=>'Select a User Role'
		])
	    ->add('save', 'submit', ['label' => 'Submit User Details']);
    }
}
