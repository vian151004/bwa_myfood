<div x-data="{ open: {{ empty($name) ? 'true' : 'false' }} }" class="flex min-h-screen flex-col bg-white font-poppins">
    <livewire:components.page-title-nav :title="'Pemesanan'" wire:key="{{ str()->random(50) }}" :hasBack="true"
        :hasFilter="false"></livewire:components.page-title-nav>

    <div class="container mb-8 space-y-10">
        <div class="space-y-2 text-black-100">
            <div class="flex items-center justify-between rounded-full border border-black-30 px-5 py-3">
                <span>Kamu di meja</span>
                <span class="text-lg font-semibold">{{ $tableNumber }}</span>
            </div>
            <div class="flex items-center justify-between rounded-full border border-black-30 px-5 py-3">
                <span>Nama Pemesan</span>
                <span class="flex items-center gap-2 text-lg font-semibold">
                    {{ $name ?? '' }}
                    <button x-on:click="open = true"
                        class="aspect-square rounded-full bg-black-30 p-2 transition-all hover:bg-black-40">
                        <img src="{{ asset('assets/icons/pencil-icon.svg') }}" alt="Edit name" />
                    </button>
                </span>
            </div>
        </div>

        <div>
            <h2 class="mb-4 text-lg font-medium text-black-100">
                Makanan yang dipesan
            </h2>

            <livewire:components.menu-item-list :withCheckbox="false" :items="$cartItems"
                wire:key="{{ str()->random(50) }}" />
        </div>

        <div class="space-y-3 rounded-xl border-2 p-5">
            <div class="flex items-center justify-between">
                <span class="font-medium text-black-50">Sub total</span>
                <span class="font-medium text-black-100">
                    Rp{{ number_format($subtotal, 0, ',', '.') }}
                </span>
            </div>
            <div class="flex items-center justify-between">
                <span class="font-medium text-black-50">PPN (11%)</span>
                <span class="font-medium text-black-100">
                    Rp{{ number_format($tax, 0, ',', '.') }}
                </span>
            </div>
            <hr class="border-2 border-dashed" />
            <div class="flex items-center justify-between">
                <span class="text-lg font-semibold text-black-50">Total</span>
                <span class="text-lg font-semibold text-black-100">
                    Rp{{ number_format($total, 0, ',', '.') }}
                </span>
            </div>
        </div>

        @if (!$hasUnpaidTransaction)
            <form action="{{ route('payment', ['token' => $paymentToken]) }}" method="POST" class="space-y-3">
                @csrf
                <button @if (empty($name) || empty($phone)) disabled @endif type="submit" name="action" value="pay"
                    class="flex w-full items-center justify-center gap-2 rounded-full bg-primary-50 px-6 py-3 font-semibold text-black-10 disabled:cursor-not-allowed disabled:bg-primary-30">
                    <span>Bayar Sekarang</span>
                    <img src="{{ asset('assets/icons/arrow-right-white-icon.svg') }}" alt="Cart" />
                </button>
            </form>
        @else
            <form action="{{ route('payment', ['token' => $paymentToken]) }}" method="POST"
                class="flex gap-4 space-y-3">
                @csrf
                <button type="submit" @if (empty($name) || empty($phone)) disabled @endif name="action" value="continue"
                    class="flex w-full items-center justify-center gap-2 rounded-full bg-primary-50 px-6 py-3 font-semibold text-black-10 disabled:cursor-not-allowed disabled:bg-primary-30">
                    <span>Lanjut Bayar</span>
                    <img src="{{ asset('assets/icons/arrow-right-white-icon.svg') }}" alt="Cart" />
                </button>
            </form>
        @endif
    </div>

    <div x-show="open">
        <livewire:components.customer-modal />
    </div>

    <livewire:components.toast />
</div>
