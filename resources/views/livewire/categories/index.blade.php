<div class="space-y-6">
    <div class="overflow-hidden rounded-2xl border border-border bg-card shadow-sm">
        <div class="grid gap-4 p-6 md:grid-cols-[1fr_auto] md:items-center">
            <div>
                <flux:heading size="sm" class="text-text-main">{{ __('Minhas categorias') }}</flux:heading>
                <flux:text class="text-text-secondary">{{ __('Gerencie as categorias que só você pode usar.') }}</flux:text>
            </div>
            <flux:link :href="route('categories.create')" wire:navigate class="text-primary hover:text-primary-hover">
                {{ __('Nova categoria') }}
            </flux:link>
        </div>

        <div class="border-t border-border p-6">
            @if($categories->isEmpty())
                <flux:text class="text-text-secondary">{{ __('Ainda não há categorias criadas.') }}</flux:text>
            @else
                <div class="space-y-3">
                    @foreach($categories as $category)
                        <div class="flex flex-col gap-4 rounded-xl border border-border bg-card-hover p-4 shadow-sm">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-lg font-semibold text-text-main">{{ $category->name }}</p>
                                </div>
                                <div class="flex flex-wrap items-center gap-2">
                                    <flux:link :href="route('categories.edit', $category)" wire:navigate class="text-primary hover:text-primary-hover">
                                        {{ __('Editar') }}
                                    </flux:link>
                                    <flux:button variant="danger" type="button" wire:click="deleteCategory({{ $category->id }})" class="bg-error hover:bg-error/90">
                                        {{ __('Excluir') }}
                                    </flux:button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">{{ $categories->links() }}</div>
            @endif
        </div>
    </div>
</div>
