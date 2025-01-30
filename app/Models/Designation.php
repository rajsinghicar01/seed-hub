<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name'
    ];

    public function User()
    {
        return $this->hasOne(User::class);
    }

    public function ControllingAuthority()
    {
        return $this->hasone(ControllingAuthority::class);
    }
}
