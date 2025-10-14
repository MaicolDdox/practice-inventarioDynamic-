<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ToolType extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'toolClass_id',
        'name',
        'description',
    ];

    public function toolClass(): BelongsTo
    {
        return $this->belongsTo(ToolClass::class, 'toolClass_id');
    }

    public function tool(): HasMany
    {
        return $this->hasMany(Tool::class);
    }

    public function attribute(): HasMany
    {
        return $this->hasMany(ToolAttribute::class);
    }
}
