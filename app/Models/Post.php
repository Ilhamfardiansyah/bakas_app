<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function suplaier()
    {
        return $this->belongsTo(Suplaier::class);
    }
}
