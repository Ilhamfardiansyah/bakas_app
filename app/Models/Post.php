<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function suplaier()
    {
        return $this->belongsTo(Suplaier::class);
    }
    public function detail()
    {
        return $this->belongsTo(Detail::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
