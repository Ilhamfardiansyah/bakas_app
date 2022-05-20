<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRak extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posts()
    {
        return $$this->hasMany(Rak::class);
    }
}
