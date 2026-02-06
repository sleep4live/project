<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CollectionPageController extends Controller
{
    /**
     * Menampilkan daftar koleksi untuk admin
     */
    public function index()
    {
        try {
            // Ambil semua koleksi dengan kategori
            $collections = Collection::with('category')
                ->orderBy('created_at', 'desc')
                ->get();
            
            // Kembalikan view dengan data
            return view('admin.collections.index', [
                'collections' => $collections,
                'totalCollections' => $collections->count()
            ]);
            
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk membuat koleksi baru
     */
    public function create()
    {
        try {
            $categories = Category::all();
            return view('admin.collections.create', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->route('admin.collections.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menyimpan koleksi baru
     */
  public function store(Request $request)
{
    try {
        // Validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'category_id' => 'nullable|exists:categories,id',
            'nomor_koleksi' => 'nullable|string|max:50',
            'tahun_masuk' => 'nullable|integer|min:1900|max:' . date('Y'),
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Upload gambar ke: storage/app/public/collections/uploads/
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan di subfolder 'uploads' dalam 'collections'
            $imagePath = $request->file('image')->store('collections/uploads', 'public');
            // Hasil: 'collections/uploads/filename.jpg'
        }

        // Buat koleksi
        Collection::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'nomor_koleksi' => $request->nomor_koleksi,
            'tahun_masuk' => $request->tahun_masuk,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.collections.index')
            ->with('success', 'Koleksi berhasil ditambahkan!');
            
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
            ->withInput();
    }
}

    /**
     * Menampilkan form untuk mengedit koleksi
     */
    public function edit($id)
    {
        try {
            $collection = Collection::findOrFail($id);
            $categories = Category::all();
            
            return view('admin.collections.edit', compact('collection', 'categories'));
        } catch (\Exception $e) {
            return redirect()->route('admin.collections.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Memperbarui koleksi
     */
  public function update(Request $request, $id)
{
    try {
        $collection = Collection::findOrFail($id);
        
        // Validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'category_id' => 'nullable|exists:categories,id',
            'nomor_koleksi' => 'nullable|string|max:50',
            'tahun_masuk' => 'nullable|integer|min:1900|max:' . date('Y'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update data
        $collection->name = $request->name;
        $collection->description = $request->description;
        $collection->category_id = $request->category_id;
        $collection->nomor_koleksi = $request->nomor_koleksi;
        $collection->tahun_masuk = $request->tahun_masuk;

        // Update gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($collection->image && Storage::disk('public')->exists($collection->image)) {
                Storage::disk('public')->delete($collection->image);
            }
            
            // Upload gambar baru ke collections/uploads
            $collection->image = $request->file('image')->store('collections/uploads', 'public');
        }

        $collection->save();

        return redirect()->route('admin.collections.index')
            ->with('success', 'Koleksi berhasil diperbarui!');
            
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
            ->withInput();
    }
}

    /**
     * Menghapus koleksi
     */
    public function destroy($id)
    {
        try {
            $collection = Collection::findOrFail($id);
            
            // Hapus gambar dari storage
            if ($collection->image && Storage::disk('public')->exists($collection->image)) {
                Storage::disk('public')->delete($collection->image);
            }
            
            $collection->delete();
            
            return redirect()->route('admin.collections.index')
                ->with('success', 'Koleksi berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.collections.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail koleksi (opsional)
     */
    public function show($id)
    {
        try {
            $collection = Collection::with('category')->findOrFail($id);
            return view('admin.collections.show', compact('collection'));
        } catch (\Exception $e) {
            return redirect()->route('admin.collections.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}