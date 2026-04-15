<?php

namespace App\Livewire\Tasks;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public string $title = '';
    public string $description = '';
    public string $priority = 'medium';
    public string $status = 'pending';
    public ?string $due_date = null;
    public ?int $category_id = null;

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => ['required', Rule::in(['low', 'medium', 'high'])],
            'status' => ['required', Rule::in(['pending', 'completed'])],
            'due_date' => 'required|date',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->where(fn ($query) => $query->where('user_id', auth()->id())),
            ],
        ];
    }

    public function saveTask(): void
    {
        Task::create(array_merge($this->validate(), ['user_id' => auth()->id()]));
        redirect()->route('tasks.index');
    }

    public function render()
    {
        $categories = Category::where('user_id', auth()->id())->orderBy('name')->get();
        return view('livewire.tasks.create', compact('categories'));
    }
}
