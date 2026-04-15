<x-layouts::app :title="__('Nova categoria')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading>{{ __('Nova categoria') }}</flux:heading>
                <flux:text>{{ __('Adicione uma categoria para organizar suas tarefas.') }}</flux:text>
            </div>
            <flux:link :href="route('categories.index')" wire:navigate>
                {{ __('Voltar às categorias') }}
            </flux:link>
        </div>

        <livewire:categories.create />
    </div>
</x-layouts::app>
