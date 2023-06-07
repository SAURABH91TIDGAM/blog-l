<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $gaurded = ['id'];

    // protected $fillable = ['title','excerpt','body'];

    // protected $with = ['category', 'author'];



    public function getRouteKeyName()
    {
        return 'slug';
    
    }

    public  function scopeFilter($query, array $filters) //Post::newQuery()->filter()
    {
        // $query->where

         $query->when($filters['search'] ?? false, function ($query, $search)
        {
         $query->where(fn($query) =>
            $query->where('title','like','%'. request('search') . '%')
            ->orWhere('body','like','%'. request('search') . '%')
            );
        });

        $query->when($filters['category'] ?? false, function ($query, $category)
        { 
            $query
            ->whereHas('category', fn($query) => $query
            ->where('slug', $category) ); 
        });

        $query->when($filters['author'] ?? false, function ($query, $author)
        { 
            $query->whereHas('author', fn($query) =>$query->where('username', $author) ); 
        });
                // ->whereExists(fn($query)=>
                //     $query->From('categories')
                //         ->whereColumn('categories.id', 'posts.category_id')
                //         ->where('categories.slug', $category));

    }


    public function comments(){

        return $this->hasMany(Comment::class);
    }



    public function category()
    {
        //has one , has Many, belongs To, belongs To many
        return $this->belongsTo(Category::class);

    }
    
    public function author(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
