<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;
    public string $name = '';

    protected function rules(): array
    {
        return ['name' => 'required|string|max:255'];
    }

    public function mount(Category $category)
    {
        abort_unless($category->user_id === auth()->id(), 404);
        $this->category = $category;
        $this->name = $category->name;
    }

    public function updateCategory(): void
    {
        $this->category->update($this->validate());
        redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.categories.edit');
    }
}
