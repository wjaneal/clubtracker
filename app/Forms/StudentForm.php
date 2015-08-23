<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class StudentForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('slname', 'text', [
		'label'=>'Surname'
		])
            ->add('sfname', 'text', [
		'label'=>'First Name'
		])
            ->add('snname', 'text', [
		'label'=>'Nick Name (Optional)'
		])
            ->add('country', 'text')
            ->add('gender', 'select',[
		'choices'=>[''=>'Select a Gender','F'=>'F', 'M'=>'M']
		])
            ->add('email', 'text')
            ->add('grade', 'select',[
		'choices' => [9=>9,10=>10,11=>11,12=>12]
		])
	    ->add('save', 'submit', ['label' => 'Submit New Student']);
    }
}
