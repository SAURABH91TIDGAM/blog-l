@if (session()->has('success'))
        
<div x-data="{ show: true }" 
    x-init="setTimeout( () => show = false, 4000)"
    x-show="show" 
    class="fixed bg-blue-500 text-white px-4 py-3 mt-15 rounded-xl top-40 right-3">

    <p>{{ session()->get('success') }}</p>

</div>
@endif 