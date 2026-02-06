<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'nomor_koleksi',
        'tahun_masuk',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}