<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'name',
        'project_id',
        'status'
    ];

    public function Project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
