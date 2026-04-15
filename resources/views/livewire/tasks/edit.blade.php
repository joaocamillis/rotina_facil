<div class="rounded-2xl border border-border bg-card p-6 shadow-sm">
    <form wire:submit.prevent="updateTask" class="space-y-6">
        <flux:input wire:model.defer="title" :label="__('Título')" type="text" required class="bg-card-hover border-border text-text-main" />
        <flux:textarea wire:model.defer="description" :label="__('Descrição')" rows="4" class="bg-card-hover border-border text-text-main" />

        <div class="grid gap-4 lg:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-text-main">{{ __('Categoria') }}</label>
                <select wire:model.defer="category_id" class="mt-2 block w-full rounded-xl border border-border bg-card-hover p-3 text-sm text-text-main focus:ring-primary" required>
                    <option value="">{{ __('Selecione') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-text-main">{{ __('Data de vencimento') }}</label>
                <input wire:model.defer="due_date" type="date" class="mt-2 block w-full rounded-xl border border-border bg-card-hover p-3 text-sm text-text-main focus:ring-primary" required />
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-text-main">{{ __('Prioridade') }}</label>
                <select wire:model.defer="priority" class="mt-2 block w-full rounded-xl border border-border bg-card-hover p-3 text-sm text-text-main focus:ring-primary" required>
                    <option value="low">{{ __('Baixa') }}</option>
                    <option value="medium">{{ __('Média') }}</option>
                    <option value="high">{{ __('Alta') }}</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-text-main">{{ __('Situação') }}</label>
                <select wire:model.defer="status" class="mt-2 block w-full rounded-xl border border-border bg-card-hover p-3 text-sm text-text-main focus:ring-primary" required>
                    <option value="pending">{{ __('Pendente') }}</option>
                    <option value="completed">{{ __('Concluída') }}</option>
                </select>
            </div>
        </div>

        <div class="flex flex-wrap gap-3">
            <flux:link :href="route('tasks.index')" wire:navigate class="text-text-secondary hover:text-text-main">
                {{ __('Cancelar') }}
            </flux:link>
            <flux:button variant="primary" type="submit" class="bg-primary hover:bg-primary-hover">
                {{ __('Atualizar tarefa') }}
            </flux:button>
        </div>
    </form>
</div>
