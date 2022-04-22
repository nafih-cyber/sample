<?php

namespace App\Http\Controllers;
use App\Models\project;
use App\Models\task;
use App\Models\TimeEntry;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = project::all();
        $tasks = task::join('projects','tasks.project_id', 'projects.id')
        ->select('tasks.id as id','projects.projectName','tasks.*')
        ->get();
        $TimeEntry = TimeEntry::join('tasks','time_entries.task_id', 'tasks.id')
        ->join('projects','time_entries.project_id', 'projects.id')
        ->select('time_entries.id as id','projects.projectName','tasks.task_name','time_entries.*')
        ->get();

        $Report=project::with('project','tasks')->get();
        return view('projects',compact('projects','tasks','TimeEntry','Report'));
    }
    public function AddProject(Request $request)
    {
        $project=new project();

        $project->projectName=$request->projectname;
        $project->status=$request->status;
        $project->save();
        return back()->with('success', 'Prject Created  Successfully');
    }
    public function search(Request $request) //fetch data with correspondent charactors
    {
    
        $Report=project::
      Where(function($query) use ($request) 
                	{
                    $query->where('projects.projectName', 'like', '%'.$request->search . '%');
                    });
        $project = $Report->first();
    // dd($project);
    $Report=project::where('id',$project->id)->with('project','tasks')->get();
    // dd($Report);
       return response()->json($Report);
    }

}
