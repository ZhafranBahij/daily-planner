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
    public $myModal2 = false;

    public function mount()
    {
        $this->plans = auth()->user()->plans->reverse();

        $this->headers = [
            ['key' => 'id', 'label' => 'No.'],
            ['key' => 'title', 'label' => 'Title'],
            ['key' => 'description', 'label' => 'Description'],
            ['key' => 'time', 'label' => 'Time'],
            ['key' => 'date', 'label' => 'Date'],
        ];
    }

    public function removeInput()
    {
        $this->form->reset();
    }

    public function edit($id)
    {
        $this->form->fill(auth()->user()->plans()->find($id)->toArray());
        $this->myModal2 = true;
    }

    public function delete($id)
    {
        auth()->user()->plans()->find($id)->delete();
        session()->flash('status', 'Data successfully deleted.');
        $this->redirectRoute('plan', navigate: true);
    }

    public function save()
    {
        $validate = $this->validate();
        auth()->user()->plans()->create($validate);
        session()->flash('status', 'Data successfully created or updated.');
        $this->redirectRoute('plan', navigate: true);
    }

    public function render()
    {
        return view('livewire.plan.plan-index');
    }
}
