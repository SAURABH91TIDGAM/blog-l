@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative">


    {{-- Trigger --}}

    <div @click="show= ! show">

        {{ $trigger }}

    </div>
    {{-- links --}}
    
    <div x-show="show" style="display:none" class="py-2 absolute bg-gray-100 w-full mt-2 rounded z-50 overglow-auto max-h-35px">
        
        {{ $slot }}

    </div>
</div>


