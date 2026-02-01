<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model


{
    public function collections()
{
    $collections = Collection::all(); // Ambil semua koleksi
    return view('frontend.collections', compact('collections'));
}

protected $fillable = ['name', 'description', 'nomor_koleksi', 'tahun_masuk', 'image'];
}
