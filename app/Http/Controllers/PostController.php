<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public function index(){
     
        // ddd(Gate::allows('admin'));

        return view('posts.index',[
            'posts'=> Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString() 
            
            // 'currentCategory' => Category::firstwhere('slug', request('category'))
        ]);
    }

    public function show(Post $post){
            return view('posts.show', [
                'post' => $post,
            ]);
        }
    
    
    public function create()
    {

       return view('admin.posts.create');
    }

    public function store(Request $request)
    {

       

        

       

        $attributes = request()->validate([
            'title' =>'required',
            'slug' => ['required', Rule::unique('posts','slug')],
            'thumbnail' => 'required|image',
            'excerpt' =>'required',
            'body' =>'required',
            'category_id' =>'required', Rule::exists('categories', 'id')
        ]);

        $attributes['user_id'] = request()->user_id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        //   ddd($attributes);
        
        Post::create($attributes);

        return redirect('/');
    }
   
    
}
