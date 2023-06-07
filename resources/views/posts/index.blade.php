<x-layout>


        @include ('posts._header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


            @if ($posts->count())

                <x-posts-grid :posts="$posts" />
            
                {{ $posts->links()}}

            @else

                <p class="text-center">No Posts yet. Please check later.</p> 
            
            @endif


        </main>

</x-layout>



    <!-- <x-slot name='banner'>

    <h1>My Blog Posts</h1>

    </x-slot>
    
    @foreach($posts as $post)
    <article>


        <h1>
        
            <a href="/posts/{{ $post->slug; }}" >
            
                {{ $post->title }}  
            </a>
        </h1>
        
        <p>
        <div>
                    by <a href="/author/{{$post->author->username}}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </div>
        </p>
        

        <div>
            {{ $post->excerpt }}
        </div> 

    </article>
    
    @endforeach -->




