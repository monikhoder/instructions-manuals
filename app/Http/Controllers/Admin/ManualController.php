<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('admins.manuals.index', [
            'manuals' => Manual::where('status', 'approved')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.manuals.create', [
            'manual' => new Manual(),
            'brands' => \App\Models\Brand::select('id', 'name')->get(),
            'categories' => \App\Models\Category::select('id', 'name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:120',
            'language' => 'required|string|max:2',
            'file_path' => 'required|file|mimes:pdf|max:10048',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);
         // Generate slug from name
        $validated['slug'] = Str::slug($validated['title']);
        // Set user_id
        $validated['user_id'] = Auth::check() ? Auth::id() : null;
        //set download count
        $validated['download_count'] = 0;
        // Set status and approval details
        if (Auth::check() && $request->user()->hasRole('admin')) {
            $validated['status'] = 'approved';
            $validated['approved_by'] = Auth::id();
            $validated['approved_at'] = now();
            $validated['rejection_reason'] = null;
        } else {
            $validated['status'] = 'pending';
            $validated['approved_by'] = null;
            $validated['approved_at'] = null;
            $validated['rejection_reason'] = null;
        }

         // Upload image if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/manuals'), $filename);
            $validated['image'] = 'img/manuals/' . $filename;
        }
        // Upload file
    if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        $filename = time() . '_' . $request->title ;
        // Store in configured local disk (storage/app/private/manuals)
        Storage::disk('local')->put($filename, file_get_contents($file));
        $validated['file_path'] = $filename;  // Relative storage path
    }

        // Create  manual
        Manual::create($validated);
        return redirect()->route('admin.manual')->with('success', 'Manual created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Manual $manual)
    // {
    //     return view('manual', compact('manual'));
    // }

    public function download(Manual $manual)
    {
        //check if not authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to download manuals.');
        }
        if (!Storage::disk('local')->exists($manual->file_path)) {
            abort(404);
        }

        $manual->increment('download_count');
        return response()->download(
            Storage::disk('local')->path($manual->file_path),
            basename($manual->title . '.pdf'),
        );
    }

    public function view(Manual $manual)
    {
        if (!Storage::disk('local')->exists($manual->file_path)) {
            abort(404);
        }
        $path = Storage::disk('local')->path($manual->file_path);
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.basename($manual->file_path).'"',
            'X-Frame-Options' => 'ALLOW-FROM '.url('/manual/'.$manual->slug),
            'Content-Length' => filesize($path),
            'Cache-Control' => 'public, max-age=3600'
        ];

        return response()->file($path, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manual $manual)
    {
        // Check if the manual exists
        if (!$manual) {
            return redirect()->route('admin.manual')->with('error', 'Manual not found.');
        }
        // Get brands and categories for the form
        $brands = \App\Models\Brand::select('id', 'name')->get();
        $categories = \App\Models\Category::select('id', 'name')->get();

        return view('admins.manuals.edit', compact('manual', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manual $manual)
    {
        // Check if the manual exists
        if (!$manual) {
            return redirect()->route('admin.manual')->with('error', 'Manual not found.');
        }

        // Validate the request
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:120',
            'language' => 'required|string|max:2',
            'file_path' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);
        //keep the existing file
        $validated['file_path'] = $manual->file_path;
        // Update slug
        $validated['slug'] = Str::slug($validated['title']);

        // Upload image if provided
        if ($request->hasFile('image')) {
            if ($manual->image && file_exists(public_path($manual->image))) {
                unlink(public_path($manual->image));
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img/manuals'), $filename);
            $validated['image'] = 'img/manuals/' . $filename;
        }
        // Update the manual record
        $manual->update($validated);

        return redirect()->route('admin.manual')->with('success', 'Manual updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manual $manual, Request $request)
    {
        //check if the manual exists
        if (!$manual) {
            return redirect()->route('admin.manual')->with('error', 'Manual not found.');
        }
        // Delete the manual file if it exists
        if ($manual->file_path && Storage::disk('local')->exists($manual->file_path)) {
            Storage::disk('local')->delete($manual->file_path);
        }
        // Delete the manual image if it exists
        if ($manual->image && file_exists(public_path($manual->image))) {
            unlink(public_path($manual->image));
        }
        // Delete the manual record
        $manual->delete();

        // Get current page
        $currentPage = $request->page ?? 1;
        // If this was the last manual on the page, go to previous page
        $newPage = Manual::where('status', 'approved')->count() % 2 === 0
            ? max(1, $currentPage - 1)
            : $currentPage;

        return redirect()->route('admin.manual', ['page' => $newPage])
            ->with('success', 'Manual deleted successfully.');
    }
}
