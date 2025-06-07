<?php

namespace App\Http\Controllers;
use App\Models\Manual;
use Spatie\Pdf\Pdf as SpatiePdf;
class HomeController extends Controller
{
    public function index()
    {
        return view('welcome')->with([
           'brands' => \App\Models\Brand::select('id', 'name','logo', 'slug')->latest()->take(10)->get(),
           'categories' => \App\Models\Category::select('id', 'name')->get(),
           'manuals' => Manual::with(['brand:id,name', 'category:id,name'])
               ->select('id', 'title', 'slug', 'image', 'brand_id', 'category_id', 'download_count')
               ->latest()
               ->paginate(10),
        ]);
    }
    public function showManual($slug)
    {
        $manual = Manual::where('slug', $slug)
                   ->select('id', 'title', 'slug', 'image', 'brand_id', 'category_id', 'download_count', 'language', 'description', 'file_path')
                   ->with(['brand:id,name', 'category:id,name'])
                   ->firstOrFail();

               $manual->increment('download_count');
               return view('manual', compact('manual'));
    }

    
}

