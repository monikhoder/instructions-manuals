<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.users.index', [
            'users' => User::select('id', 'name', 'email', 'role', 'status', 'profile_picture')
                ->latest()
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the authenticated user is admin
        /** @var \App\Models\User $user */
        $user = Auth::user();
        if (!$user?->isAdmin()) {
            return redirect()->back()->with('error', 'You do not have permission to create users.');
        }
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // redirect to the users index with success message
        return redirect()->route('admin.users')->with('success', 'User created successfully with password "password".');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    // Update user status (ban or unban)
    public function ban(Request $request, User $user)
    {
        //check if the user ban themselves
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot ban yourself.');
        }

        $existinguser = User::find($user->id);
        $existinguser->status = $request->status;
        if ($existinguser->status === 'banned') {
            // Invalidate all sessions for banned user
            DB::table('sessions')
                ->where('user_id', $user->id)
                ->delete();
            $existinguser->remember_token = null; // Clear remember token
        }
        $existinguser->save();
        return redirect()->route('admin.users')->with('success', 'User status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Check if the user is trying to delete themselves
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot remove yourself.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User removed successfully.');
    }
}

