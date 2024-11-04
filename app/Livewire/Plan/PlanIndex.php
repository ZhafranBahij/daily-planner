<?php

namespace App\Livewire\Plan;

use App\Livewire\Forms\PlanForm;
use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PlanIndex extends Component
{
    public $plans, $headers;
    public PlanForm $form;

    public function mount()
    {
        $this->plans = auth()->user()->plans;
        // dd($this->plans);

        $this->headers = [
            ['key' => 'id', 'label' => 'No.'],
            ['key' => 'title', 'label' => 'Title'],
            ['key' => 'time', 'label' => 'Time'],
            ['key' => 'date', 'label' => 'Date']
        ];
    }

    public function save()
    {
        $validate = $this->validate();
        // dd($validate);
        auth()->user()->plans()->create($validate);

        $this->redirectRoute('plan', navigate: true);
    }

    public function render()
    {
        return view('livewire.plan.plan-index');
    }
}
