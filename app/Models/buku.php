<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }
}
