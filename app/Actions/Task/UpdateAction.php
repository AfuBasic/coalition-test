<?php

namespace App\Actions\Task;

use App\Models\Task;

class UpdateAction
{
    public function execute(Task $task, $data): Task
    {
        $task->update($data);
        return $task;
    }
}
