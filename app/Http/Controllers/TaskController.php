<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use App\Http\Requests\AddTask;
use App\Http\Requests\DeleteTask;
use App\Http\Requests\UpdateTask;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index ()
    {
        $tasks = Task::get();
        $tasks = TaskResource::collection($tasks);

        return Response::success('Tasks Fetched Successfully',$tasks);
    }

    public function store(AddTask $request)
    {
        $validated = $request->validated();

        try {
            Task::create($validated);
        } catch (Exception $e) {
            return Response::error('Something went wrong! Please try again',[]);
        }

        return Response::success('Task Created Successfully',[]);
    }

    public function delete(DeleteTask $request)
    {
        $validated = $request->validated();

        try {
            Task::where('id',$validated['task_id'])->delete();
        } catch (Exception $e) {
            return Response::error('Something went wrong! Please try again',[]);
        }

        return Response::success('Task Deleted Successfully',[]);
    }

    public function update(UpdateTask $request)
    {
        $validated = $request->validated();

        try {
            Task::where('id',$validated['task_id'])
            ->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
            ]);
        } catch (Exception $e) {
            return Response::error('Something went wrong! Please try again',[]);
        }

        return Response::success('Task Updated Successfully',[]);
    }
}
