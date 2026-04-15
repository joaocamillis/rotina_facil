<div class="space-y-6">
    <div class="grid gap-4 md:grid-cols-3">
        <section class="rounded-2xl border border-border bg-card p-6 shadow-sm">
            <flux:heading size="sm" class="text-text-main">{{ __('Pendentes') }}</flux:heading>
            <div class="mt-4 text-4xl font-semibold text-text-main">{{ $pendingCount }}</div>
            <flux:text class="mt-2 text-sm text-text-secondary">{{ __('Tarefas ainda não concluídas') }}</flux:text>
        </section>

        <section class="rounded-2xl border border-border bg-card p-6 shadow-sm">
            <flux:heading size="sm" class="text-text-main">{{ __('Concluídas') }}</flux:heading>
            <div class="mt-4 text-4xl font-semibold text-text-main">{{ $completedCount }}</div>
            <flux:text class="mt-2 text-sm text-text-secondary">{{ __('Tarefas finalizadas') }}</flux:text>
        </section>

        <section class="rounded-2xl border border-error bg-card p-6 shadow-sm">
            <flux:heading size="sm" class="text-error">{{ __('Vencidas') }}</flux:heading>
            <div class="mt-4 text-4xl font-semibold text-error">{{ $overdueCount }}</div>
            <flux:text class="mt-2 text-sm text-error">{{ __('Tarefas com vencimento no passado') }}</flux:text>
        </section>
    </div>

    <section class="rounded-2xl border border-border bg-card p-6 shadow-sm">
        <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading class="text-text-main">{{ __('Próximas tarefas') }}</flux:heading>
                <flux:text class="text-text-secondary">{{ __('Tarefas com vencimento mais próximo em aberto.') }}</flux:text>
            </div>
            <flux:link :href="route('tasks.index')" wire:navigate class="text-primary hover:text-primary-hover">
                {{ __('Ver todas') }}
            </flux:link>
        </div>

        <div class="mt-6 space-y-4">
            @forelse($nextTasks as $task)
                <div class="rounded-xl border border-border bg-card-hover p-4 shadow-sm">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-lg font-semibold text-text-main">{{ $task->title }}</p>
                            <div class="mt-2 flex flex-wrap gap-2 text-sm text-text-secondary">
                                <span>{{ $task->category->name }}</span>
                                <span>{{ $task->due_date->format('d/m/Y') }}</span>
                                <span>{{ __('Pendente') }}</span>
                            </div>
                        </div>
                        <span class="rounded-full bg-primary-soft px-3 py-1 text-sm font-semibold text-primary">{{ __('Próxima') }}</span>
                    </div>
                </div>
            @empty
                <flux:text class="text-text-secondary">{{ __('Nenhuma tarefa próxima encontrada.') }}</flux:text>
            @endforelse
        </div>
    </section>
</div>
