<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ParentsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('sid', 'select')
            ->add('parent', 'text')
            ->add('fname', 'text')
            ->add('lname', 'text')
            ->add('dob', 'text')
            ->add('country', 'text')
            ->add('state', 'text')
            ->add('postalcode', 'text')
            ->add('phone', 'text')
            ->add('fax', 'text')
            ->add('email', 'text')
            ->add('city', 'text')
            ->add('address1', 'text');
    }
}