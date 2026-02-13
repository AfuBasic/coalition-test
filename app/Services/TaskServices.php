<?php

namespace App\Services;

use App\Models\Task;
use Hashids\Hashids;
use Illuminate\Support\Facades\DB;

class TaskServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function reorderTasks($projectId, array $taskIds = [])
    {
        //To avoid unique constraints we temporarily set the ids to something else first before running the update

        Task::where('project_id', $projectId)->update([
            'priority' => DB::raw('priority + 100000')
        ]);

        $basic_ids = [];
        foreach($taskIds as $task_id){
            $basic_ids[] = app(Hashids::class)->decode($task_id)[0];
        }

        $cases = [];
        $bindings = [];
        foreach($basic_ids as $index => $id){
            $cases[] = "WHEN ? THEN ?";
            $bindings[] = $id;
            $bindings[] = $index + 1;
        }

        $caseSql = implode(' ', $cases);
        $placeholder = implode(',', array_fill(0, count($basic_ids), '?'));
        $bindings = array_merge($bindings, $basic_ids);
        
        $rawQuery = "UPDATE tasks SET priority = CASE id " . $caseSql . " END WHERE id IN (" . $placeholder . ") AND project_id = ?";
        return DB::update($rawQuery, [...$bindings, $projectId]);

    }
}
