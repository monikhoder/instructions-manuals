<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.brands.index', [
            'brands' => Brand::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:brands',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string'
        ]);
        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);
        // Upload logo if provided
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('img/brands'), $filename);
            $validated['logo'] = 'img/brands/' . $filename;
        }

        Brand::create($validated);
        return redirect()->route('admin.brand')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admins.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,'.$brand->id,
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string'
        ]);

        // Handle logo update or removal
        if ($request->remove_logo == '1') {
            // Delete existing logo if it exists
            if ($brand->logo && file_exists(public_path($brand->logo))) {
                unlink(public_path($brand->logo));
            }
            $validated['logo'] = null;
        } elseif ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($brand->logo && file_exists(public_path($brand->logo))) {
                unlink(public_path($brand->logo));
            }
            // Upload new logo
            $logo = $request->file('logo');
            $filename = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('img/brands'), $filename);
            $validated['logo'] = 'img/brands/' . $filename;
        }


        $brand->update($validated);

        return redirect()->route('admin.brand', ['page' => $request->page])
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Brand $brand)
    {
        //check have brand or not
        if(!$brand) {
            return redirect()->route('brands.index')
                ->with('error', 'Brand not found.');
        }

        // Delete logo file if exists
        if($brand->logo && file_exists(public_path($brand->logo))) {
            unlink(public_path($brand->logo));
        }
        $brand->delete();

        return redirect()->route('admin.brand', ['page' => $request->page])
            ->with('success', 'Brand deleted successfully.');
    }
}
