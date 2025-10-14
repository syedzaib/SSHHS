<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserApprovedNotification;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));

        // $pendingUsers = User::where('is_approved', false)->get();
        // return view('admin.dashboard', compact('pendingUsers'));
    }

    public function approve(User $user)
    {
         $user->update(['is_approved' => true]);

        // Send email notification to user
        $user->notify(new UserApprovedNotification());

        return redirect()->back()->with('success', 'User approved successfully.');
    }
    // Show edit form
    public function edit(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }
    // Update user info
    public function update(Request $request, User $user)
{
    $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|max:255|unique:users,email,'.$user->id,
    'id_number' => 'required|string|max:50',
    'date_of_birth' => 'required|date',
    'mobile_number' => 'required|string|max:20',
    'nationality' => 'required|string|max:50',
    'gender' => 'required|in:male,female',
    'qualification' => 'nullable|string|max:100',
    'specialization' => 'nullable|string|max:100',
    'role' => 'required|in:admin,user',
    'is_approved' => 'required|boolean',
    ]); 

    // Only fillable attributes will update
    $user->update($request->all());

    return redirect()->route('admin.dashboard')->with('success', 'User updated successfully.');
}
public function destroy(User $user)
{
    // Optional: prevent admin from deleting themselves
    if (auth()->id() === $user->id) {
        return redirect()->back()->with('error', 'You cannot delete yourself.');
    }

    $user->delete();

    return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
}
}
