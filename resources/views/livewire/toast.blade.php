<div x-data="{ visible: $wire.entangle('visible').live }" x-show="visible" @hide-toast.window="setTimeout(() => visible = false, 3000)"
    :class="{
        'bg-success-70': '{{ $type }}'
        === 'success',
        'bg-warning-60': '{{ $type }}'
        === 'warning',
        'bg-error-70': '{{ $type }}'
        === 'danger'
    }"
    class="fixed bottom-5 left-1/2 z-50 w-fit min-w-72 -translate-x-1/2 transform rounded-full px-4 py-3 font-poppins shadow-md"
    x-cloak x-transition:enter="transition duration-300 ease-out"
    x-transition:enter-start="translate-y-2 transform opacity-0"
    x-transition:enter-end="translate-y-0 transform opacity-100" x-transition:leave="transition duration-300 ease-in"
    x-transition:leave-start="translate-y-0 transform opacity-100"
    x-transition:leave-end="translate-y-2 transform opacity-0">
    <div class="flex items-center gap-2">
        <img src="{{ asset('assets/icons/cart-filled-icon.svg') }}" class="h-12 w-12" alt="Cart Filled" />
        <div>
            <p class="whitespace-nowrap text-lg font-semibold text-black-10">
                {{ $message1 }}
            </p>
            @if (true)
                <p class="text-sm font-medium text-black-10">
                    {{ $message2 }}
                </p>
            @endif
        </div>
    </div>
</div>
