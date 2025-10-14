<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'tools_id',
        'attributes_id',
        'value',
    ];

    public function tool(): BelongsTo
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }

    public function toolAttribute(): BelongsTo
    {
        return $this->belongsTo(ToolAttribute::class, 'toolAttribute_id');
    }
}
