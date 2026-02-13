<?php

namespace App\Actions\Task;

use App\Models\Project;

class CreateAction
{
    public function execute(Project $project, array $data)
    {
        return $project->tasks()->create([
            'name' => $data['name'],
            'priority' => $data['priority'],
            'status' => $data['status'],
        ]);
    }
}
