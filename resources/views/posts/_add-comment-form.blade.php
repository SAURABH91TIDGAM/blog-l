@auth

<x-panel>

    <form method="POST" action="/posts/{{ $post->slug }}/comments">

        @csrf

        <header class="flex item-center">
            <img src="https://i.pravatar.cc/65?u={{ auth()->id() }}" alt="" style="width-40px height=40px">

            <h2 class="ml-4">Want to participate?</h2>
        </header>
    
        <x-form.field>
            
            <x-form.textarea name="body" />           
            <x-form.error name="body" />

        </x-form.field>

        <div class="flex justify-end border-t border-gray-200 pt-6">

           <x-form.button>Post</x-form.button>
        </div>

    </form>
</x-panel>

                            
@else
    
    <p>

        <a href="/register" class="text-blue-500">Register</a> or  <a href="/login" class="text-blue-500">Log in </a>to leave a comment.

    </p>

@endauth
