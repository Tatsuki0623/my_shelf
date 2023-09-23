<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function show(User $user)
    {
        
        return view('home.othershelf')->with([
            'favorited_users' => $user->getFavoriteUser(),
            'unFavorite_users' => $user->getNotFavoriteUser(),
            ]);
    }
    
    public function favorite(Request $request, Favorite $favorite, User $user)
    {
        $input = $request['favorite'];
        $input['registing_id'] = Auth::user()->id;
        $favorite->fill($input)->save();
        
        return redirect('/othershelf');
    }
    
    public function unFavorite(Favorite $favorite)
    {
        $favorite->delete();
        return redirect('/othershelf');
    }
}
