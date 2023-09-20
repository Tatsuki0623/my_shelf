<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    public function memos()
    {
        return $this->hasMany(Memo::class);
    }
    
    public function read_times()
    {
        return $this->hasMany(ReadTime::class);
    }
    
    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class,'favorites','registing_id','registered_id')->withPivot('id','registing_id','registered_id');
    }
    
    public function favorites()
    {
        return $this->belongsToMany(User::class,'favorites','registered_id','registing_id');
    }
    
    
    public function getAllUsers()
    {
        return $this->all();
    }
    
    public function getFavoriteUser()
    {
        $favorite_users = Auth::user()->favoriteUsers()->get();
        
        return $favorite_users;
    }
    
    public function getNotFavoriteUser()
    {
        $favorited_users = $this->getFavoriteUser();
        
        $favorited_users_id = array();
        foreach($favorited_users as $favorited_user){
            $favorited_users_id[] = $favorited_user->id;
        }
        
        return $this->whereNotIn('id',$favorited_users_id)->get();
    }
}
