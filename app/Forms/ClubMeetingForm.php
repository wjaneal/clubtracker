<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ClubMeetingForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('clubid', 'text')
            ->add('meetingdate', 'text')
	    ->add('save', 'submit', ['label' => 'Submit Club Meeting']);
    }
}
