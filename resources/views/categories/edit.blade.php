<x-layouts::app :title="__('Editar categoria')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading>{{ __('Editar categoria') }}</flux:heading>
                <flux:text>{{ __('Atualize o nome da categoria.') }}</flux:text>
            </div>
            <flux:link :href="route('categories.index')" wire:navigate>
                {{ __('Voltar às categorias') }}
            </flux:link>
        </div>

        <livewire:categories.edit :category="$category" />
    </div>
</x-layouts::app>
