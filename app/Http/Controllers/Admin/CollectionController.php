<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('admin')) {
                return redirect('/login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $collections = Collection::all();
        return view('admin.collections.index', compact('collections'));
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'nomor_koleksi' => 'nullable|string|max:100',
            'tahun_masuk' => 'nullable|integer|min:1900|max:' . date('Y'),
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'nomor_koleksi' => $request->nomor_koleksi,
            'tahun_masuk' => $request->tahun_masuk,
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $imageName);
            $data['image'] = $imageName;
        }

        Collection::create($data);

        return redirect()->route('admin.collections.index')
                         ->with('success', 'Koleksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        return view('admin.collections.edit', compact('collection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'nomor_koleksi' => 'nullable|string|max:100',
            'tahun_masuk' => 'nullable|integer|min:1900|max:' . date('Y'),
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $collection = Collection::findOrFail($id);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'nomor_koleksi' => $request->nomor_koleksi,
            'tahun_masuk' => $request->tahun_masuk,
        ];

        if ($request->hasFile('image')) {
            if ($collection->image && file_exists(public_path('uploads/' . $collection->image))) {
                unlink(public_path('uploads/' . $collection->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $imageName);
            $data['image'] = $imageName;
        }

        $collection->update($data);

        return redirect()->route('admin.collections.index')
                         ->with('success', 'Koleksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);

        if ($collection->image && file_exists(public_path('uploads/' . $collection->image))) {
            unlink(public_path('uploads/' . $collection->image));
        }

        $collection->delete();

        return redirect()->route('admin.collections.index')
                         ->with('success', 'Koleksi berhasil dihapus!');
    }
}