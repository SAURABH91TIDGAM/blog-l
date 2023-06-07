@props(['name'])

@error($name) 

    <div class="text-red-600 p-2 bg-red-100 border-l-4 border-orange-500 text-xs">{{ $message }}</div>

@enderror