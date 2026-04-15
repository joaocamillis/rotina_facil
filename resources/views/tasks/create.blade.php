<x-layouts::app :title="__('Nova tarefa')">
    <div class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading>{{ __('Nova tarefa') }}</flux:heading>
                <flux:text>{{ __('Cadastre uma nova tarefa com categoria, prioridade e vencimento.') }}</flux:text>
            </div>
            <flux:link :href="route('tasks.index')" wire:navigate>
                {{ __('Voltar às tarefas') }}
            </flux:link>
        </div>

        <livewire:tasks.create />
    </div>
</x-layouts::app>
