<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('tasks.index', [
            'tasks' => DB::table('tasks')
                ->join('users', 'tasks.user_id', '=', 'users.id')
                ->select('tasks.*', 'users.name as user_name')
                ->latest('tasks.created_at')
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tasks.create', [
            'users' => DB::table('users')->orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $taskId = DB::table('tasks')->insertGetId($data);

        return redirect()->route('tasks.show', $taskId);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $task): View
    {
        $task = DB::table('tasks')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select('tasks.*', 'users.name as user_name')
            ->where('tasks.id', $task)
            ->first();

        abort_if($task === null, 404);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $task): View
    {
        $task = DB::table('tasks')->where('id', $task)->first();

        abort_if($task === null, 404);

        return view('tasks.edit', [
            'task' => $task,
            'users' => DB::table('users')->orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $task): RedirectResponse
    {
        DB::table('tasks')
            ->where('id', $task)
            ->update([
                ...$request->validated(),
                'updated_at' => now(),
            ]);

        return redirect()->route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $task): RedirectResponse
    {
        DB::table('tasks')->where('id', $task)->delete();

        return redirect()->route('tasks.index');
    }
}
