<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $categories = Category::where('user_id', auth()->id())
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.categories.index', compact('categories'));
    }

    public function deleteCategory(int $categoryId): void
    {
        $category = Category::where('user_id', auth()->id())
            ->findOrFail($categoryId);

        $category->delete();
        $this->resetPage();
    }
}
