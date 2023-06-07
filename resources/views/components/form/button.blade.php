@props(['name'])

<x-form.field>

    <button type="submit" class="mt-2 flex items-center justify-center px-10 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        {{ $slot }}
    </button>

</x-form.field>
