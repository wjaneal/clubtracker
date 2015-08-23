<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ClubForm extends Form
{
    public function buildForm()
    {
 	$teachers = \App\User::all();
        $teacherchoices = [''=>'Select a Teacher'];
        foreach($teachers as $teacher){
                $teacherchoices[$teacher->id] = $teacher->name;
        }
        $this
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('teacherid', 'select',[ 
		'choices'=>$teacherchoices,
		'label'=>'Teacher'
		]);
    }
}
