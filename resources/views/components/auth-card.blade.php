<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{-- {{ $logo }} --}}
        <img src="{{ asset('images/logo_ccis_dt.png') }}"class="block fill-current text-gray-600">    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
