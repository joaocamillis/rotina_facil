<?php

use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('categories', 'categories.index')->name('categories.index');
    Route::view('categories/create', 'categories.create')->name('categories.create');
    Route::get('categories/{category}/edit', function (Category $category) {
        abort_unless($category->user_id === auth()->id(), 404);

        return view('categories.edit', compact('category'));
    })->name('categories.edit');

    Route::view('tasks', 'tasks.index')->name('tasks.index');
    Route::view('tasks/create', 'tasks.create')->name('tasks.create');
    Route::get('tasks/{task}/edit', function (Task $task) {
        abort_unless($task->user_id === auth()->id(), 404);

        return view('tasks.edit', compact('task'));
    })->name('tasks.edit');
});

require __DIR__.'/settings.php';
