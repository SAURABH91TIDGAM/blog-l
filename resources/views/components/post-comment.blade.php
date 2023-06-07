
@props(['comment'])

<x-panel class="bg-gray-100">

    <article class="flex space-x-4">

        <div style="flex-shrink: 0">
            <img src="https://i.pravatar.cc/65?u={{ $comment->user_id }}" alt="" style="width-65px height=65px">
        </div>
            
    
            <div>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs"> Posted <time> {{ $comment->created_at->format('y D') }}</time></p>
            
    
                <header>
                    <p>
                        {{ $comment->body }}
                    </p>
                </header>
            </div>
        
        
    </article>

</x-panel>    

