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
        $previous = url()->previous();
        return redirect($previous);
    }
    
    public function unFavorite(User $user)
    {
        $user->detachFavorite($user->id);
        $previous = url()->previous();
        return redirect($previous);
    }
    
    public function Public(Request $request, User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        $previous = url()->previous();
        return redirect($previous);
    }
}
