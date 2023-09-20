<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
        
    protected $fillable = ['registing_id','registered_id'];
    protected $table = 'favorites';
}
