<div x-data="{ open: false }" class="flex min-h-screen flex-col bg-white font-poppins">
    <livewire:components.page-title-nav :title="'Keranjang'" wire:key="{{ str()->random(50) }}" :hasBack="true"
        :hasFilter="false" />

    <div class="container">
        <h2 class="mb-4 text-lg font-medium text-black-100">
            Baru Ditambahkan
        </h2>

        @if (isset($cartItems) && count($cartItems) > 0)
            <livewire:components.menu-item-list :items="$cartItems" wire:key="{{ str()->random(50) }}" />

            <div class="mt-6 flex items-center justify-between">
                <button x-on:click="open = true"
                    class="flex items-center gap-2 rounded-full bg-primary-10 px-6 py-3 font-semibold text-primary-50">
                    Hapus ({{ count($selectedItems) }})
                </button>
                <button x-bind:disabled="!{{ count($selectedItems) }} > 0" wire:click="checkout"
                    class="flex items-center gap-2 rounded-full bg-primary-50 px-6 py-3 font-semibold text-black-10 disabled:bg-primary-30">
                    <span>Pesan Sekarang</span>
                    <img src="{{ asset('assets/icons/arrow-right-white-icon.svg') }}" alt="Cart" />
                </button>
            </div>
        @else
            <div>
                <img src="{{ asset('assets/images/bg-cart-empty.png') }}" alt="Tidak ada data"
                    class="w-full overflow-hidden rounded-3xl" />
                <div class="mt-4 w-full text-center">
                    <p class="text-lg font-semibold text-black-80">
                        Tidak Ada Data
                    </p>
                    <p class="text-sm font-medium text-black-30">
                        Silakan masukkan makanan kamu disini
                    </p>
                </div>
            </div>
        @endif
    </div>

    <div x-show="open">
        <livewire:components.delete-confirm-modal />
    </div>
</div>
