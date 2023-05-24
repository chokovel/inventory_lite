<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function showProfile(Request $request)
    {
        // Retrieve the authenticated user
        $user = $request->user();

        // Pass the user to the view
        return view('layouts.homehead', compact('user'));
    }

   public function index()
    {
        $staff = User::all();
        $roles = Role::all();
        return view('staff.index', compact('staff', 'roles'));
    }
   public function create()
    {
        $roles = Role::all();

        return view('staff.create', compact('roles'));
    }

     public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
        'dob' => 'nullable|date',
        'address' => 'nullable|string',
        'password' => 'nullable|string|min:8', // Minimum password length of 8 characters
        'role' => 'required|exists:roles,id', // Validating the role input
    ]);

    $data['password'] = Hash::make($data['password']); // Hash the password before storing

    $user = User::create($data); // Create the user and get the user instance

    $role = Role::findById($request->input('role')); // Find the role by ID
    $user->assignRole($role); // Assign the role to the user

    return redirect()->route('staff.index')->with('success', 'User created successfully.');
}


    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('staff.edit', compact('user', 'roles'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'password' => 'nullable|string|min:8', // Minimum password length of 8 characters
            'role' => 'required|exists:roles,name', // Validating the role input
        ]);

        $user = User::findOrFail($id); // Find the user by ID

        $user->update($data); // Update the user with the new data

        $role = Role::where('name', $request->input('role'))->first(); // Find the role by name
        $user->syncRoles([$role]); // Sync the user's roles, replacing the existing roles with the new role

        return redirect()->route('staff.index')->with('success', 'User updated successfully.');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('staff.index')->with('success', 'User deleted successfully.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchNamePhone');

        $results = User::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('phone', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('roles', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->get();

        return view('staff.search', compact('results'));
    }
}
