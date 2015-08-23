<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class NotesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('referencetype', 'select')
            ->add('referenceid', 'select')
            ->add('date', 'date')
            ->add('note', 'textarea');
    }
}