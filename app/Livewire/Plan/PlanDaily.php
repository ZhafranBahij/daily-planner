<?php

namespace App\Livewire\Plan;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PlanDaily extends Component
{
    public $plans;

    public function mount()
    {
        $this->plans = auth()
                            ->user()
                            ->plans
                            // ->where('date', today())
                            ->reverse();
    }

    public function render()
    {
        return view('livewire.plan.plan-daily');
    }
}
