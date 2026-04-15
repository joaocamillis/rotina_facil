<?php

namespace App\Livewire\Tasks;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public ?int $category = null;
    public ?string $priority = null;
    public ?string $status = null;

    public array $priorityLabels = [
        'low' => 'Baixa',
        'medium' => 'Média',
        'high' => 'Alta',
    ];

    public array $statusLabels = [
        'pending' => 'Pendente',
        'completed' => 'Concluída',
    ];

    public function updatedCategory(): void
    {
        $this->resetPage();
    }

    public function updatedPriority(): void
    {
        $this->resetPage();
    }

    public function updatedStatus(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();

        $tasks = Task::with('category')
            ->where('user_id', auth()->id())
            ->when($this->category, fn ($query) => $query->where('category_id', $this->category))
            ->when($this->priority, fn ($query) => $query->where('priority', $this->priority))
            ->when($this->status, fn ($query) => $query->where('status', $this->status))
            ->orderBy('due_date')
            ->paginate(10);

        return view('livewire.tasks.index', compact('tasks', 'categories'));
    }

    public function markComplete(int $taskId): void
    {
        $task = Task::where('user_id', auth()->id())->findOrFail($taskId);
        $task->update(['status' => 'completed']);
    }
}
