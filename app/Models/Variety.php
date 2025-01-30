<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variety extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'variety_name',
        'year_of_notification',
        'average_yield',
        'oil_content',
        'day_of_maturity',
        'release'
    ];

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
