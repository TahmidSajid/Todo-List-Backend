<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index ()
    {
        $tasks = Task::get();
        $tasks = TaskResource::collection($tasks);

        return Response::success('Tasks Fetched Successfully',$tasks);
    }

    public function store(Request $request)
    {
        
    }
}
