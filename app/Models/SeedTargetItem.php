<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rule;

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

    public static function rules($seed_target_id, $item_id = null)
    {
        return [
            'variety_id' => [
                'required',
                Rule::unique('seed_target_items')->where(function ($query) use ($seed_target_id) {
                    return $query->where('seed_target_id', $seed_target_id);
                })->ignore($item_id)
            ],
            'category_id' => 'required',
            'total_seed_quantity' => 'required|numeric',
        ];
    }
}
