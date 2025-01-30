<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centre extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'centre_name',
        'centre_address',
        'zone_id',
        'state_id',
        'pincode',
        'user_id',
        'controlling_authority_id'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function controllingAuthority()
    {
        return $this->belongsTo(controllingAuthority::class);
    }
}
