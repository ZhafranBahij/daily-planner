<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plan') }}
        </h2>
    </x-slot>

    {{-- MODAL To Create or Edit Plan --}}
    <x-mary-modal wire:model="myModal2" title="Plan" subtitle="Create / Edit Plan" separator>
        <x-mary-form wire:submit="save" class="mb-5">
            <x-mary-input label="Title" wire:model="form.title" />
            <x-mary-input label="Description" wire:model="form.description"   />
            <x-mary-datetime label="Date" wire:model="form.date" icon="o-calendar" />
            <x-mary-datetime label="Time" wire:model="form.time" icon="o-calendar" type="time" />
            <x-mary-select label="Status" icon="o-check-circle" :options="$status_plan" wire:model="form.status" />

            <x-slot:actions>
                <x-mary-button label="Cancel" @click="$wire.myModal2 = false" />
                <x-mary-button label="Submit" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('status'))
                        <x-mary-alert title="{{ session('status') }}" class="alert-success mb-5" icon="o-check" dismissible />
                    @endif
                    {{-- Button to create Plan and display modal --}}
                    <x-mary-button icon="o-plus" @click="$wire.myModal2 = true" wire:click="removeInput" class="btn-sm btn-primary mb-5" />

                    @if ($plans)
                        {{-- Table to display plans --}}
                        <x-mary-table :headers="$headers" :rows="$plans" striped>
                            @scope('actions', $plans)
                            <div class="flex flex-row gap-2">
                                <x-mary-button icon="o-pencil" wire:click="edit({{ $plans->id }})" spinner class="btn-sm" />
                                <x-mary-button icon="o-trash" wire:click="delete({{ $plans->id }})" wire:confirm="Are you sure you want to delete this plan?" spinner class="btn-sm" />
                            </div>
                            @endscope
                        </x-mary-table>
                    @else
                        <x-mary-header title="I'm apologize" subtitle="You don't have any plan yet" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
