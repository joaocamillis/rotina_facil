<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';

    protected function rules(): array
    {
        return ['name' => 'required|string|max:255'];
    }

    public function saveCategory(): void
    {
        $data = $this->validate();
        $data['user_id'] = auth()->id();
        Category::create($data);

        redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.categories.create');
    }
}
