<?php

namespace App\Http\Controllers;
use App\Models\Manual;
class HomeController extends Controller
{
    public function index()
    {
        // filter
         $filters = request()->only(
            'search'
        );

        return view('home.index')->with([
           'brands' => \App\Models\Brand::select('id', 'name','logo', 'slug')
               ->latest()
               ->filter($filters)
               ->take(10)
               ->get(),
           'categories' => \App\Models\Category::select('id', 'name')->get(),
           'manuals' => Manual::with(['brand:id,name', 'category:id,name'])
               ->select('title', 'slug', 'image', 'brand_id', 'category_id', 'download_count')
               ->latest()
               ->filter($filters)
               ->paginate(10),
        ]);
    }
    public function showManual($slug)
    {
        $manual = Manual::where('slug', $slug)
                   ->select('title', 'slug', 'image', 'brand_id', 'category_id', 'download_count', 'language', 'description')
                   ->with(['brand:id,name,slug', 'category:id,name'])
                   ->firstOrFail();

               return view('home.manual', compact('manual'));
    }
    public function showBrand($slug)
    {
        $brand = \App\Models\Brand::where('slug', $slug)
            ->select('id', 'name', 'logo', 'description')
            ->firstOrFail();

        return view('home.brand')->with([
            'brand' => $brand,
            'manuals' => Manual::where('brand_id', $brand->id)
                ->select('title', 'slug', 'image', 'brand_id', 'category_id', 'download_count')
                ->latest()
                ->paginate(10),
        ]);
    }
}

