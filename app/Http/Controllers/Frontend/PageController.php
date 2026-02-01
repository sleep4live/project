<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Collection; // ← TAMBAHKAN INI

class PageController extends Controller
{
   public function collections()
{
    $collections = Collection::all();
    return view('frontend.collections', compact('collections')); 
}
    public function collectionDetail($id)
    {
        $collection = Collection::findOrFail($id); // ← BISA DIUPGRADE JUGA
        return view('frontend.collection-detail', compact('collection'));
    }

    public function about()
    {
        return view('frontend.about'); // ← lebih baik pakai view juga
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}