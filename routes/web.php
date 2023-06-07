<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsLetterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/   
    // index show, create, store, edit, update, destroy, delete  7 RESTful methods.


    
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('newsletter', [NewsLetterController::class, '__invoke']);
Route::Post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');




Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('can:admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');


Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
Route::patch('admin/posts/{post}/edit', [AdminPostController::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('can:admin');

    // $posts = Post::all();

// method number 1
    // $posts = collect(File::files(resource_path("posts")))
    // ->map(fn($file) => yamlFrontMatter::parseFile($file))
    // ->map(fn($document) => new Post(
    //         $document->title,
    //         $document->slug,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body()
    //     ));
    
    // DB::listen(function($query){
    //     logger($query->sql, $query->bindings);

    // });



    // Making this even simpler in in the code above.


// method number 2


//     $files =  File::files(resource_path("posts"));

//     $posts = collect($files)->map(function($file){
//         $document = YamlFrontMatter::parseFile($file);

//         return new Post(
//             $document->title,
//             $document->slug,
//             $document->excerpt,
//             $document->date,
//             $document->body()
//         );
//     });


    // above method is a simpler form of executing the same below
// method  number 2
    //$files =  File::files(resource_path("posts"));

    // $posts = array_map(function($file){

    //     $document = yamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->slug,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body()
    //     );
    // },$files);


    // above method is a simple form of executing the same below 
// method number 3
    //$files =  File::files(resource_path("posts"));
   // $posts = [];

    // foreach($files as $file)
    // {
    //     $document = yamlFrontMatter::parseFile($file);
    //     $posts[]= new Post(
    //         $document->title,
    //         $document->slug,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
            
    //     );

        
    //}

        // ddd($posts);

     

    // $document = yamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));

    // ddd($document->matter());
    // $posts = Post::all();
    //  return view('posts',['posts'=> $posts]);



    


    // return $slug;


    // method number 1.


    // $path = __DIR__."/../resources/posts/{$slug}.html";

    // if(! file_exists($path)){
    //     // ddd('file does not exist.');
    //     return redirect('/');
    // }

    // $post = cache()->remember("posts.{$slug}", now()->addminutes(1), function () use($path) {

    //     // var_dump('file_get_contents'); 

    //     return file_get_contents($path);

    // });

   

    // return view('post',[
    //     'post' => $post]);

  

                  // Find a post by its slug and pass it to the view called "post"

    //new syntax using key words "view name","object name that is post" class
    
    
    // method number 2.


    // $post = Post::findOrfail($id);
       

// above route will repalce this route.
// Route::get('/categories/{category:slug}', function (Category $category) {
    
//     return view('posts',[
//         'posts'=> $category->posts,
//         'currentCategory'=>$category,
//         'categories' => Category::all()
//     ]);
// })->name('category');


// Route::get('/?author=/{author:username}', function (User $author) {
    
//     return view('posts.show',[
//         'posts'=> $author->posts,
//     ]);
// });
