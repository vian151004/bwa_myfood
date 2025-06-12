<div x-cloak x-show="open" x-transition.opacity.duration.200ms x-trap.inert.noscroll="open"
    @keydown.esc.window="open = false" x-on:click.self="open = false"
    class="fixed inset-0 z-30 flex items-center justify-center bg-black-100/50 font-poppins" role="dialog"
    aria-modal="true" aria-labelledby="defaultModalTitle">
    <div x-show="open" x-transition:enter="transition delay-100 duration-200 ease-out motion-reduce:transition-opacity"
        x-transition:enter-start="scale-50 opacity-0" x-transition:enter-end="scale-100 opacity-100"
        class="min-w-[300px] max-w-sm overflow-hidden rounded-2xl bg-white p-4 text-black-100">
        <div class="flex items-center justify-between">
            <h3 class="{{ isset($title) ? 'block' : 'invisible' }} text-lg font-semibold text-black-100">
                {{ $title ?? 'Modal Title' }}
            </h3>
            @if ($showClose)
                <div x-on:click="open = false"
                    class="grid aspect-square place-content-center rounded-full bg-primary-10 p-2 hover:bg-primary-20">
                    <img src="{{ asset('assets/icons/x-icon.svg') }}" alt="Close modal" />
                </div>
            @endif
        </div>

        <!-- Dialog Body -->
        @yield('content')
    </div>
</div>
