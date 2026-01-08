<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Lead;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request, Lead $lead) {
        Gate::authorize('update', $lead);
        $lead->tasks()->create($request->validated());
        return back()->with('success', 'Task added.');
    }

    public function toggle(Task $task) {
        Gate::authorize('update', $task->lead);
        $task->update(['is_done' => !$task->is_done]);
        return back();
    }
}
