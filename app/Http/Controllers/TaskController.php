<?php

namespace App\Http\Controllers;

use App\Actions\Task\CreateAction;
use App\Http\Requests\Task\TaskCreateRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Services\ProjectService;
use App\Services\TaskServices;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(public ProjectService $projectService, public TaskServices $taskService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $tasks = $project->tasks()->select('id', 'name', 'priority','status')->oldest('priority');
        $all_projects = $this->projectService
                        ->projects()
                        ->get()
                        ->mapWithKeys(function($project){
                            return [route('project.tasks.index', $project->hashid) => $project->name];
                        })->toArray();
        
        return view('tasks.index',
            [
                'project' => $project,
                'all_projects' => $all_projects,
                'tasks' => $tasks->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('tasks.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request, CreateAction $createAction, Project $project)
    {
        $createAction->execute($project, $request->validated());
        return redirect()->route('project.tasks.index', $project->hashid)->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task, 'project' => $task->project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('project.tasks.index', $task->project->hashid)->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function handleTaskWithoutProject()
    {
        $project = Project::first();

        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Please create a project to view tasks');
        }

        return redirect()->route('project.tasks.index', $project->hashid);
    }

    public function reorderTasks(Project $project, Request $request)
    {
        $this->taskService->reorderTasks($project->id, $request->task_ids);
        return response()->json([
            'success' => true,
        ]);
    }
}
