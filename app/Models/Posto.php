<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{


    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;


    public function __construct($title, $slug, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }


    public static function find($slug)
    {

        $post = static::all()->firstwhere('slug', $slug);
               
        if(! $post){
            throw new ModelNotFoundException();
        }

        return $post;
    //  $path = resource_path("posts/{$slug}.html");
    
    //     if(!file_exists($path)){
    //         // ddd('file does not exist.');
    //         // return redirect('/');
    //         throw new ModelNotFoundException();
    //     }

    //             // return cache()->remember("posts.{$slug}", 5, function () use($path) {


    //                 //     return file_get_contents($path);

    //             // });

    //     return file_get_contents($path); 



        // new method to get the content of html pages where slug matches

        // $posts = static::all();

        // $posts->firstwhere('slug', $slug);

                      //  or

        
     
              

    }


    public static function all(){

        // $files =  File::files(resource_path("posts/"));

        // return array_map(function($file){

        //     return $file->getContents();
        // }, $files);


        return cache()->rememberForever('posts.all',function(){
                
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => yamlFrontMatter::parseFile($file))
                    ->map(fn($document) => new Post(
                        $document->title,
                        $document->slug,
                        $document->excerpt,
                        $document->date,
                        $document->body()
                        ))
                        ->sortByDesc('date');
            });

    }



    
    public static function findOrfail($slug)
    {
    
        $post = static::find($slug);
               
        if(! $post){
            throw new ModelNotFoundException();
        }
        return $post;
    }



}