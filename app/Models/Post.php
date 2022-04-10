<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id']; 

    public function tb_rak()
    {
        return $$this->belongsTo(tb_rak::class);
    }
}
