<?php

namespace App\Models;

use App\HasHashId;
use Hashids\Hashids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasHashId;
    protected $fillable = [
        'name',
        'project_id',
        'priority',
        'status'
    ];
    
    public function Project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    
    protected function projectId(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => is_numeric($value) ? $value : app(Hashids::class)->decode($value)[0] ?? null
        );
    }
}
