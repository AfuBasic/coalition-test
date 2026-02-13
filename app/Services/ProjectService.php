<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }

    public function projects(): LengthAwarePaginator
    {
        return Project::paginate(10);
    }
}
