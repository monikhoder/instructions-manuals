<?php

namespace App\Http\Controllers;

use App\Models\Manual;

class UserController extends Controller
{
    public function index()
    {

        return view('users.index');
    }
    public function my_upload(){
        return view('users.my-upload')->with([
            'title' => 'My Uploads',
            'manuals' => Manual::where('user_id', auth()->id())
                ->select('title', 'slug', 'image', 'brand_id', 'category_id', 'download_count')
                ->latest()
                ->paginate(10),
        ]);
    }
}
