<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class EnrolmentForm extends Form
{
    public function buildForm()
    {
	$studentdata = \App\Student::all()->sortBy('sfname')->sortBy('slname');
	$students = array(''=>'Please select a student');
	foreach($studentdata as $sd){
		$students[$sd->id]=$sd->slname.', '.$sd->sfname;
		}
	$clubdata = \App\Club::all()->sortBy('name');
	$clubs = array(''=>'Please select a club');
	foreach($clubdata as $cd){
		$clubs[$cd->id] = $cd->name;
		}
        $this
            ->add('studentid', 'select', [
		'choices' => $students,
		'label' => 'Student'
		])
            ->add('clubid', 'select', [
		'choices' => $clubs,
		'label'=>'Club'
		])
	    ->add('save', 'submit', ['label' => 'Submit Enrolment']);
    }
}
