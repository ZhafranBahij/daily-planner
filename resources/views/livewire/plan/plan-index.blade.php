<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-mary-form wire:submit="save" class="mb-5">
                        <x-mary-input label="Title" wire:model="form.title" />
                        <x-mary-input label="Description" wire:model="form.description"   />
                        <x-mary-datetime label="Date" wire:model="form.date" icon="o-calendar" />
                        <x-mary-datetime label="Time" wire:model="form.time" icon="o-calendar" type="time" />

                        <x-slot:actions>
                            <x-mary-button label="Cancel" />
                            <x-mary-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
                        </x-slot:actions>
                    </x-mary-form>
                    @if ($plans)
                        <x-mary-table :headers="$headers" :rows="$plans" striped @row-click="alert($event.detail.title)" />
                    @else
                        <x-mary-header title="I'm apologize" subtitle="You don't have any plan yet" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
