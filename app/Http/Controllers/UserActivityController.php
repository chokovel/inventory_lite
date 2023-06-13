<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;
use App\Models\User;

class UserActivityController extends Controller
{
    public function index(){
        $userId = Auth::id();
        
        $user = User::find($userId);
        $activities = $user->activities;
        return view('dashboard.history', compact('activities'));
    }
}
