<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'genre', 'language', 'description', 'cover', 'user_id'];


    // filter based on the genre
    public function scopeFilter($query, array $filters){
        if($filters['genre'] ?? false){
            $query->where('genre', 'like', '%' . request('genre') . "%");
        }
        if($filters['language'] ?? false){
            $query->where('language', 'like', '%' . request('language') . "%");
        }
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . "%")
            ->orWhere('language', 'like', '%' . request('search') . "%")
            ->orWhere('genre', 'like', '%' . request('search') . "%");
        }
    }

    // relationship
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
