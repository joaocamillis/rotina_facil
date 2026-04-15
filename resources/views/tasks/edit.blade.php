<x-layouts::app :title="__('Editar tarefa')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading>{{ __('Editar tarefa') }}</flux:heading>
                <flux:text>{{ __('Atualize os detalhes da tarefa e a categoria.') }}</flux:text>
            </div>
            <flux:link :href="route('tasks.index')" wire:navigate>
                {{ __('Voltar às tarefas') }}
            </flux:link>
        </div>

        <livewire:tasks.edit :task="$task" />
    </div>
</x-layouts::app>
