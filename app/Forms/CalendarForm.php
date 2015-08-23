<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CalendarForm extends Form
{
    public function buildForm()
    {
	$this->add('dates[]','checkbox');
    }
}
