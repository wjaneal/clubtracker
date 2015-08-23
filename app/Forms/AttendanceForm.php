<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AttendanceForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('student', 'select')
            ->add('clubmeetingid', 'text')
            ->add('entry', 'text')
	    ->add('save', 'submit', ['label' => 'Submit Attendance']);
    }
}
