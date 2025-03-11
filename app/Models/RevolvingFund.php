<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RevolvingFund extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'centre_id',
        'season_id',
        'released_fund',
        'description',
        'infrastructure_fund',
        'utilized_infrastructure_fund',
        'available_infrastructure_fund',
        'training_organized',
        'field_day',
        'seed_procurement',
        'seed_quantity',
        'procurement_rate',
        'procurement_amount',
        'farm_operations',
        'other_activities',
        'total_expenditures',
        'seed_sold',
        'seed_sold_rate',
        'amount_receipt',
        'interest_on_released_fund',
        'total_incomes',
        'opening_balance'
    ];

    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function RevolvingFundAllocation()
    {
        return $this->belongsTo(RevolvingFundAllocation::class);
    } 

}