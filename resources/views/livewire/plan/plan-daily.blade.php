<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Today') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-4 gap-4">
                        @forelse ($plans as $item )
                            <x-mary-card class="mb-3" title="{{ $item->title }}" subtitle="{{ $item->description }}" shadow separator>
                                {{ $item->time  }}
                                {{ $item->status ? 'Completed' : 'Pending' }}
                            </x-mary-card>
                        @empty
                            <x-mary-card title="{{ 'Sorry' }}" subtitle="{{ 'No data found' }}" shadow separator>
                                {{ 'Nice to meet you!' }}
                            </x-mary-card>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
