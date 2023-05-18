<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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

        return view('staff.index', ['staff' => $staff]);
    }
   public function create()
    {
        return view('staff.create');
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
        ]);

        $data['password'] = Hash::make($data['password']); // Hash the password before storing

        User::create($data);

        return redirect()->route('staff.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
         $staff = User::find($id);

        if (!$staff) {
            abort(404);
        }

        return view('staff.edit', ['staff' => $staff]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
            'password' => 'nullable|string|min:8',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

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
}
