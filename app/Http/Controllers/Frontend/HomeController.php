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
            // Ambil SEMUA koleksi untuk ditampilkan di bagian "Koleksi"
            $collections = Collection::all(); // atau ->latest()->get() jika mau urut terbaru

            // Tetap ambil highlighted untuk keperluan lain (opsional)
            $highlightedCollections = Collection::where('is_highlighted', true)
                ->limit(6)
                ->get();

            $totalCollections = Collection::count();

            return view('frontend.home', [
                'collections' => $collections,             // ← ini yang dipakai di bagian #collections
                'highlightedCollections' => $highlightedCollections,
                'totalCollections' => $totalCollections
            ]);

        } catch (\Exception $e) {
            dd("Error: " . $e->getMessage());
        }
    }
}