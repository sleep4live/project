<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // Hanya untuk stats di homepage
            $totalCollections = Collection::count();
            
            // Ambil beberapa koleksi untuk highlight jika mau (opsional)
            $highlightedCollections = Collection::where('is_highlighted', true)
                ->limit(3)
                ->get();

            return view('frontend.home', [
                'highlightedCollections' => $highlightedCollections,
                'totalCollections' => $totalCollections
            ]);

        } catch (\Exception $e) {
            return view('frontend.home', [
                'highlightedCollections' => collect(),
                'totalCollections' => 0
            ]);
        }
    }
}