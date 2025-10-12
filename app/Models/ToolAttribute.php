<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ToolAttribute extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'toolType_id',
        'data',
        'data_type',
    ];

    public function toolType(): BelongsTo
    {
        return $this->belongsTo(ToolType::class);
    }

    public function attributeValue(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}
