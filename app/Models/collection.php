<?php
// app/Models/Collection.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'nomor_koleksi', 
        'tahun_masuk', 
        'image', 
        'is_highlighted',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}