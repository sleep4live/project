<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Category;

class CollectionController extends Controller
{
    public function index()
    {
        try {
            // Ambil kategori dengan koleksi
            $categories = Category::with(['collections' => function($query) {
                $query->orderBy('created_at', 'desc');
            }])->get();

            // Ambil koleksi tanpa kategori
            $uncategorized = Collection::whereNull('category_id')
                ->orderBy('created_at', 'desc')
                ->get();

            // Filter kategori yang punya koleksi
            $categoriesWithCollections = $categories->filter(function($category) {
                return $category->collections->isNotEmpty();
            });

            // Tambahkan "Tanpa Kategori" jika ada
            if ($uncategorized->count() > 0) {
                $dummyCategory = new \stdClass();
                $dummyCategory->name = 'Sejarah IPB';
                $dummyCategory->collections = $uncategorized;
                $categoriesWithCollections->push($dummyCategory);
            }

            // Urutkan kategori
            $orderedCategories = $categoriesWithCollections->sortBy(function($category) {
                $order = [
                    'Sejarah' => 1,
                    'Pendidikan' => 2,
                    'Tanpa Kategori' => 3,
                    'Seni' => 4,
                    'Teknologi' => 5,
                ];
                return $order[$category->name] ?? 999;
            });

            $totalCollections = Collection::count();

            return view('frontend.koleksi', [
                'categories' => $orderedCategories,
                'totalCollections' => $totalCollections
            ]);

        } catch (\Exception $e) {
            return view('frontend.koleksi', [
                'categories' => collect(),
                'totalCollections' => 0,
                'error' => 'Terjadi kesalahan saat memuat koleksi.'
            ]);
        }
    }
}