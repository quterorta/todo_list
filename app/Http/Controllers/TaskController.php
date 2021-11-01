<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use App\Events\SendingEmail;
use App\Mail\TaskCreate;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $user = Auth::user();

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $user->id;
        $task->save();

        SendingEmail::dispatch($task);

        $email = env('MAIL_TO_ADDRESS');
        Mail::to($email)->send(new TaskCreate($task));

        return redirect()->route('home')->withSuccess('Задание "'.$task->title.'" успешно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task/show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task/edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('home')->withSuccess('Задание "'.$task->title.'" изменено!');
    }

    public function completeTask($task_id)
    {
        $task = Task::find($task_id);

        $task->completed = 1;
        $task->save();

        return redirect()->back()->withSuccess('Задание "'.$task->title.'" выполнено!');
    }

    public function uncompleteTask($task_id)
    {
        $task = Task::find($task_id);

        $task->completed = 0;
        $task->save();

        return redirect()->back()->withSuccess('Выполнение задания "'.$task->title.'" отменено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('home')->withAlert('Задание "'.$task->title.'" удалено!');
    }
}
