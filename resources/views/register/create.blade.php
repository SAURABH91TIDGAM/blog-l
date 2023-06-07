<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-20 bg-gray-100 p-6 rounded-xl border border-blue-500">

            <h1 class="text-center font-bold text-xl">Register</h1>

            <form method="POST" action="/register">
                @csrf
            
                <div>
                    <label for="name" class="block text-grey-700 text-xs font-bold mb-2">Name</label>
                    <input class="border border-gray-300 w-100" value="{{ old('name')}}" type="text" name="name" required>

                    
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message}} </p>
                    @enderror

                </div>


                <div class="mb-6 mt-2">
                    <label for="username" class="block text-grey-700 text-xs font-bold mb-2">User Name</label>
                    
                    <input class="border border-gray-300 w-full" value="{{ old('username')}}"type="text" name="username" id="username" required > 
                    
                    
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message}} </p>
                    @enderror

                </div>

                <div class="mb-6 mt-2">
                    <label for="email" class="block text-grey-700 text-xs font-bold mb-2">E-mail</label>
                    
                    <input class="border border-gray-300 w-full" value="{{ old('email')}} "type="email" name="email" id="email" required > 
                    
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message}} </p>
                    @enderror

                </div>

                <div class="mb-6 mt-2">
                    <label for="password" class="block text-grey-700 text-xs font-bold mb-2">Password</label>
                    
                    <input type="password" class="border border-gray-300 w-full" type="text" name="password" id="password" required > 
                    
                    
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message}} </p>
                    @enderror
                </div>
            

                <div>
                    <button type="submit" class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">Register</button>
                </div>

                {{-- @if ($errors->all())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>     --}}
            </form>

        </main>
    </section>

</x-layout>