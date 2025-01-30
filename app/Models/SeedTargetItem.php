<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeedTargetItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'seed_target_id',
        'crop_id',
        'variety_id',
        'category_id',
        'total_seed_quantity',
        'created_by'
    ];

    public function seedTarget(): BelongsTo
    {
        return $this->belongsTo(seedTarget::class);
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->hasOne(SeedProductionStatus::class);
    }
}
