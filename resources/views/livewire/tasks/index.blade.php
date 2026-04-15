<div class="space-y-6">
    <div class="rounded-2xl border border-border bg-card p-6 shadow-sm">
        <div class="grid gap-4 lg:grid-cols-[1fr_auto]">
            <div>
                <flux:heading size="sm" class="text-text-main">{{ __('Filtros') }}</flux:heading>
                <flux:text class="text-text-secondary">{{ __('Refine a lista por categoria, prioridade ou situação.') }}</flux:text>
            </div>
            <div class="grid gap-3 sm:grid-cols-3">
                <div>
                    <label class="block text-sm font-medium text-text-main">{{ __('Categoria') }}</label>
                    <select wire:model="category" class="mt-2 block w-full rounded-xl border border-border bg-card-hover p-3 text-sm text-text-main focus:ring-primary">
                        <option value="">{{ __('Todas') }}</option>
                        @foreach($categories as $categoryItem)
                            <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main">{{ __('Prioridade') }}</label>
                    <select wire:model="priority" class="mt-2 block w-full rounded-xl border border-border bg-card-hover p-3 text-sm text-text-main focus:ring-primary">
                        <option value="">{{ __('Todas') }}</option>
                        <option value="low">{{ __('Baixa') }}</option>
                        <option value="medium">{{ __('Média') }}</option>
                        <option value="high">{{ __('Alta') }}</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main">{{ __('Situação') }}</label>
                    <select wire:model="status" class="mt-2 block w-full rounded-xl border border-border bg-card-hover p-3 text-sm text-text-main focus:ring-primary">
                        <option value="">{{ __('Todas') }}</option>
                        <option value="pending">{{ __('Pendente') }}</option>
                        <option value="completed">{{ __('Concluída') }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-4">
        @forelse($tasks as $task)
            <div class="rounded-xl border p-4 shadow-sm transition-colors duration-150 @if($task->isOverdue()) border-error bg-card @else border-border bg-card @endif">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="text-lg font-semibold text-text-main">{{ $task->title }}</p>
                        <div class="mt-2 flex flex-wrap gap-2 text-sm text-text-secondary">
                            <span>{{ $task->category->name }}</span>
                            <span>{{ $task->due_date->format('d/m/Y') }}</span>
                            <span class="rounded-full px-2 py-1 text-xs font-medium @if($task->priority === 'high') bg-error text-white @elseif($task->priority === 'medium') bg-warning text-black @else bg-primary-soft text-primary @endif">{{ $priorityLabels[$task->priority] }}</span>
                            <span class="rounded-full px-2 py-1 text-xs font-medium @if($task->status === 'completed') bg-success text-white @else bg-primary-soft text-primary @endif">{{ $statusLabels[$task->status] }}</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        @if($task->status === 'pending')
                            <flux:button variant="primary" type="button" wire:click="markComplete({{ $task->id }})" class="bg-primary hover:bg-primary-hover">
                                {{ __('Marcar como concluída') }}
                            </flux:button>
                        @endif
                        <flux:link :href="route('tasks.edit', $task)" wire:navigate class="text-primary hover:text-primary-hover">
                            {{ __('Editar') }}
                        </flux:link>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-border bg-card p-6 text-center shadow-sm">
                <flux:text class="text-text-secondary">{{ __('Nenhuma tarefa encontrada com esses filtros.') }}</flux:text>
            </div>
        @endforelse
    </div>

    <div>{{ $tasks->links() }}</div>
</div>
