<x-layouts::app :title="__('Tarefas')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading>{{ __('Tarefas') }}</flux:heading>
                <flux:text>{{ __('Acompanhe suas tarefas e aplique filtros por categoria, prioridade e situação.') }}</flux:text>
            </div>
            <flux:link :href="route('tasks.create')" wire:navigate variant="primary">
                {{ __('Nova tarefa') }}
            </flux:link>
        </div>

        <livewire:tasks.index />
    </div>
</x-layouts::app>
