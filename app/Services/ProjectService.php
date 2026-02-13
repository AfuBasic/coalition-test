<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }

    public function projects(): Builder
    {
        return Project::latest();
    }

    public function deleteProject(Project $project): void
    {
        $project->delete();
    }
}
