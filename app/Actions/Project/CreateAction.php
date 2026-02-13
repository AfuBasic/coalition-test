<?php

namespace App\Actions\Project;

use App\Models\Project;

class CreateAction
{
    public function execute($data)
    {
        Project::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }
}
