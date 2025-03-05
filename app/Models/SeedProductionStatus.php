<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedProductionStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity_produced',
        'seed_available_for_sale',
        'seed_price',
        'reserved_seed',
        'seed_target_item_id',
        'reason_for_shortfall',
        'major_constraints_for_distribution',
        'seed_sold',
        'seed_sold_date'
    ];

    public function item()
    {
        return $this->belongsTo(SeedTargetItem::class);
    }
}
