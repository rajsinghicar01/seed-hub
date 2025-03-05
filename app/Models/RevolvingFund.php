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
        'earning_by_seed_sale_etc',
        'interest_on_released_fund',
        'total_earning_available',
        'opening_balance',
        'infrastructure_fund',
        'utilized_infrastructure_fund',
        'available_infrastructure_fund'
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
