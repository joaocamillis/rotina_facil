<div class="rounded-2xl border border-border bg-card p-6 shadow-sm">
    <form wire:submit.prevent="updateCategory" class="space-y-6">
        <flux:input wire:model.defer="name" :label="__('Nome da categoria')" type="text" required class="bg-card-hover border-border text-text-main" />

        <div class="flex flex-wrap gap-3">
            <flux:link :href="route('categories.index')" wire:navigate class="text-text-secondary hover:text-text-main">
                {{ __('Cancelar') }}
            </flux:link>
            <flux:button variant="primary" type="submit" class="bg-primary hover:bg-primary-hover">
                {{ __('Atualizar categoria') }}
            </flux:button>
        </div>
    </form>
</div>
