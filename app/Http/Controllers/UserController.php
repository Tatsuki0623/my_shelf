<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        
        return view('home.othershelf')->with([
            'users' => $user->getUsers(),
            'favorited_users' => $user->getFavoriteUsers(),
            'check' => $user,
            ]);
    }
    
    public function favorite(User $user)
    {
        $user->attachFavorite($user->id);
        return redirect('/othershelf');
    }
    
    public function unFavorite(User $user)
    {
        $user->detachFavorite($user->id);
        return redirect('/othershelf');
    }
}
