<div class="container flex items-center justify-between p-4 font-poppins">
    <div class="{{ $hasBack ? 'block' : 'invisible' }} grid aspect-square cursor-pointer place-content-center rounded-full bg-primary-10 p-3 transition-all hover:bg-primary-20"
        x-data x-on:click="window.history.back()">
        <img src="{{ asset('assets/icons/arrow-left-icon.svg') }}" alt="Back" />
    </div>

    <h2 class="text-xl font-semibold text-black-100">{{ $title }}</h2>

    <div class="{{ $hasFilter ? 'block' : 'invisible' }} grid aspect-square cursor-pointer place-content-center rounded-full bg-primary-10 p-3 transition-all hover:bg-primary-20"
        x-on:click="open = !open">
        <img src="{{ asset('assets/icons/filter-icon.svg') }}" alt="Search" />
    </div>
</div>
