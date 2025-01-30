<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControllingAuthority extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'responsive_person',
        'designation_id',
        'authority_name',
        'phone_no',
        'email'
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

}