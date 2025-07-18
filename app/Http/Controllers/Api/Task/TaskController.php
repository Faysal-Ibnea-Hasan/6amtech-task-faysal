<?php

namespace App\Http\Controllers\Api\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Traits\CustomApiResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use CustomApiResponse;

    protected function getAuthUser()
    {
        return auth('api')->user();
    }

    protected function belongsToAuthUser(Task $task): bool
    {
        return $task->user_id === $this->getAuthUser()?->id;
    }

    public function index()
    {
        $user = $this->getAuthUser();
        if (!$user) {
            return $this->errorResponse([], __('error.not_found', ['attribute' => 'User']), 404);
        }
        $tasks = $user->tasks()->with(['assignee', 'assigner'])->get();
        if ($tasks->isEmpty()) {
            return $this->successResponse([], __('error.no_content'));
        }
        return $this->successResponse(TaskResource::collection($tasks), __('success.fetch_success', ['attribute' => 'task']));
    }

    public function store(StoreRequest $request)
    {
        $user = $this->getAuthUser();
        $task = Task::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'expire_date' => $request->expire_date,
        ]);
        return $this->successResponse(new TaskResource($task), __('success.create_success', ['attribute' => 'task']), 201);
    }

    public function show($id)
    {
        $task = Task::with(['assignee', 'assigner'])->find($id);
        if (!$task) {
            return $this->errorResponse([], __('error.not_found', ['attribute' => 'Task']), 404);
        }
        if (!$this->belongsToAuthUser($task)) {
            return $this->errorResponse([], __('error.unauthorized', ['attribute' => 'task']), 403);
        }
        return $this->successResponse(new TaskResource($task), __('success.fetch_success', ['attribute' => 'task']));
    }

    public function update(UpdateRequest $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return $this->errorResponse([], __('error.not_found', ['attribute' => 'Task']), 404);
        }
        if (!$this->belongsToAuthUser($task)) {
            return $this->errorResponse([], __('error.unauthorized', ['attribute' => 'task']), 403);
        }
        $success = $task->update($request->only(['title', 'description', 'status', 'expire_date']));
        if ($success) {
            return $this->successResponse(new TaskResource($task), __('success.update_success', ['attribute' => 'task']));
        }
        return $this->errorResponse([], __('error.update_failed', ['attribute' => 'task']), 500);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return $this->errorResponse([], __('error.not_found', ['attribute' => 'Task']), 404);
        }
        if (!$this->belongsToAuthUser($task)) {
            return $this->errorResponse([], __('error.unauthorized', ['attribute' => 'task']), 403);
        }
        if ($task->delete()) {
            return $this->successResponse([], __('success.delete_success', ['attribute' => 'task']));
        }
        return $this->errorResponse([], __('error.delete_failed', ['attribute' => 'task']), 500);
    }
}

