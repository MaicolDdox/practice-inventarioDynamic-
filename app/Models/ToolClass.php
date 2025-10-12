<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ToolClass extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'icon',
        'class',
        'description',
    ];

    public function toolType(): HasMany
    {
        return $this->hasMany(ToolType::class);
    }
}
