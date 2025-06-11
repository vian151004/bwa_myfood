<div>
    @if ($withCheckbox)
        <div class="mb-2">
            <label class="relative flex cursor-pointer select-none items-center pl-6">
                <span class="-mt-0.5 text-sm font-medium text-black-50">
                    Pilih Semua
                </span>
                <input type="checkbox" wire:model.live="$parent.selectAll"
                    class="peer absolute h-0 w-0 cursor-pointer opacity-0" />
                <span
                    class="absolute left-0 top-0 h-4 w-4 rotate-180 rounded ring-2 ring-black-50 transition-colors duration-200 ease-in-out after:absolute after:left-1.5 after:top-1 after:h-3 after:w-1.5 after:rotate-45 after:border-2 after:border-b-0 after:border-r-0 after:border-black-50 peer-checked:ring-primary-50 peer-checked:after:block peer-checked:after:border-primary-50"></span>
            </label>
        </div>
    @endif

    <div class="space-y-2">
        @foreach ($items as $index => $item)
            <div class="flex items-center justify-between py-2" wire:key="item-{{ $index }}">
                <div class="flex w-full items-center">
                    @if ($withCheckbox)
                        <label class="relative -mt-4 inline-block cursor-pointer select-none pl-4">
                            <input type="checkbox" wire:model.live="$parent.cartItems.{{ $index }}.selected"
                                wire:change="$parent.updateSelectedItems()" value="{{ $item['id'] }}"
                                class="peer absolute h-0 w-0 cursor-pointer opacity-0" />
                            <span
                                class="absolute left-0 top-0 h-4 w-4 rotate-180 rounded ring-2 ring-black-50 transition-colors duration-200 ease-in-out after:absolute after:left-1.5 after:top-1 after:h-3 after:w-1.5 after:rotate-45 after:border-2 after:border-b-0 after:border-r-0 after:border-black-50 peer-checked:ring-primary-50 peer-checked:after:block peer-checked:after:border-primary-50"></span>
                        </label>
                    @endif

                    <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}"
                        class="ml-2 h-16 w-16 rounded-lg" />
                    <div class="ml-4 w-full space-y-2">
                        <p class="font-semibold text-black-100">
                            {{ $item['name'] }}
                        </p>
                        <div class="flex w-full items-center justify-between">
                            <div>
                                <span class="block font-semibold text-black-50">
                                    RP
                                    {{ $item['price_afterdiscount'] ? number_format($item['price_afterdiscount'], 0, ',', '.') : number_format($item['price'], 0, ',', '.') }}
                                </span>
                                @if ($item['is_promo'])
                                    <span class="-mt-1 block text-sm text-black-30 line-through">
                                        RP
                                        {{ number_format($item['price'], 0, ',', '.') }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-center gap-2">
                                <button wire:click="$parent.decrement({{ $index }})"
                                    class="aspect-square h-8 w-8 rounded-full border border-black-30 bg-white p-1 px-2 py-1 text-black-50 hover:border-primary-50 hover:text-primary-50 focus:border-primary-50 focus:text-primary-50">
                                    -
                                </button>
                                <span class="mx-2 w-4 text-center">
                                    {{ $item['quantity'] }}
                                </span>
                                <button wire:click="$parent.increment({{ $index }})"
                                    class="aspect-square h-8 w-8 rounded-full border border-black-30 bg-white p-1 px-2 py-1 text-black-50 hover:border-primary-50 hover:text-primary-50 focus:border-primary-50 focus:text-primary-50">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
