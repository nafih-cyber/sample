<?php

namespace App\Http\Controllers;
use App\Models\task;
use App\Models\TimeEntry;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function AddTask(Request $request)
    {
        $task=new task();

        $task->project_id=$request->project;
        $task->task_name=$request->taskname;
        $task->status=$request->status;
        $task->save();
        return back()->with('success', 'Task Created  Successfully');
    }
    public function taskproject(Request $request)
    {
        $task=task::where('project_id',$request->id)->get();
        return response()->json($task);
    }
    public function addTime(Request $request)
    {
        $timeEnty= new TimeEntry();
        $timeEnty->project_id=$request->project;
        $timeEnty->task_id=$request->task;
        $timeEnty->hours=$request->hour;
        $timeEnty->Date=$request->date;
        $timeEnty->description=$request->desc;
        $timeEnty->save();
        return back()->with('success', 'Time Entry Added  Successfully');
    }
}
