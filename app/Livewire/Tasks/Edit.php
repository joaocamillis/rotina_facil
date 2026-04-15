<?php

namespace App\Livewire\Tasks;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Task $task;
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

    public function mount(Task $task)
    {
        abort_unless($task->user_id === auth()->id(), 404);
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description ?? '';
        $this->priority = $task->priority;
        $this->status = $task->status;
        $this->due_date = $task->due_date->format('Y-m-d');
        $this->category_id = $task->category_id;
    }

    public function updateTask(): void
    {
        $this->task->update($this->validate());
        redirect()->route('tasks.index');
    }

    public function render()
    {
        $categories = Category::where('user_id', auth()->id())->orderBy('name')->get();
        return view('livewire.tasks.edit', compact('categories'));
    }
}
