<?php

namespace App\Actions\Project;

use App\Models\Project;

class UpdateAction
{
    public function execute(Project $project, array $data): Project
    {
        $project->update($data);
        return $project;
    }
}
