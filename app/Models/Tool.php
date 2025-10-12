<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'toolType_id',
        'name',
        'img',
        'description',
        'state',
    ];

    public function toolType(): BelongsTo
    {
        return $this->belongsTo(ToolType::class);
    }

    public function attributeValue(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function loan(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}
