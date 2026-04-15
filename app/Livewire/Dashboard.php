<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class Dashboard extends Component
{
    public int $pendingCount = 0;
    public int $completedCount = 0;
    public int $overdueCount = 0;
    public $nextTasks = [];

    public function render()
    {
        $userId = auth()->id();

        $this->pendingCount = Task::where('user_id', $userId)->where('status', 'pending')->count();
        $this->completedCount = Task::where('user_id', $userId)->where('status', 'completed')->count();
        $this->overdueCount = Task::where('user_id', $userId)->where('status', 'pending')->whereDate('due_date', '<', now())->count();
        $this->nextTasks = Task::with('category')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->whereDate('due_date', '>=', now())
            ->orderBy('due_date')
            ->limit(5)
            ->get();

        return view('livewire.dashboard');
    }
}
