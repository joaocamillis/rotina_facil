<x-layouts::app :title="__('Categorias')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading>{{ __('Categorias') }}</flux:heading>
                <flux:text>{{ __('Organize suas categorias de tarefas.') }}</flux:text>
            </div>
            <flux:link :href="route('categories.create')" wire:navigate variant="primary">
                {{ __('Nova categoria') }}
            </flux:link>
        </div>

        <livewire:categories.index />
    </div>
</x-layouts::app>
