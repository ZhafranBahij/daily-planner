<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanForm extends Form
{
    #[Validate]
    public $title, $description, $time, $date;

    public function rules()
    {
        return [
            'title' =>'required|string|max:255',
            'description' =>'required|string|max:255',
            'time' =>'required',
            'date' =>'required',
        ];
    }
}
