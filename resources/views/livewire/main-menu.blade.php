<nav class="fixed bottom-0 z-20 w-full max-w-md rounded-t-3xl bg-white p-4 font-poppins">
    <div class="flex items-center justify-around">
        <a class="flex flex-col items-center" href="/" wire:navigate>
            <img src="{{ request()->routeIs('home') ? asset('assets/icons/home-active-icon.svg') : asset('assets/icons/home-icon.svg') }}"
                alt="Home" />
            <span class="{{ request()->routeIs('home') ? 'text-primary-50' : 'text-black-100' }} mt-1 text-sm">
                Home
            </span>
        </a>
        <a class="flex flex-col items-center" href="/cart" wire:navigate>
            <img src="{{ request()->routeIs('payment.cart') ? asset('assets/icons/cart-active-icon.svg') : asset('assets/icons/cart-icon.svg') }}"
                alt="Cart" />
            <span class="{{ request()->routeIs('payment.cart') ? 'text-primary-50' : 'text-black-100' }} mt-1 text-sm">
                Cart
            </span>
        </a>
        <a class="flex flex-col items-center" href="/food/promo" wire:navigate>
            <img src="{{ request()->routeIs('product.promo') ? asset('assets/icons/promo-active-icon.svg') : asset('assets/icons/promo-icon.svg') }}"
                alt="Promo" />
            <span class="{{ request()->routeIs('product.promo') ? 'text-primary-50' : 'text-black-100' }} mt-1 text-sm">
                Promo
            </span>
        </a>
        <a class="flex flex-col items-center" href="/food" wire:navigate>
            <img src="{{ request()->routeIs('product.index') ? asset('assets/icons/food-active-icon.svg') : asset('assets/icons/food-icon.svg') }}"
                alt="All Food" />
            <span class="{{ request()->routeIs('product.index') ? 'text-primary-50' : 'text-black-100' }} mt-1 text-sm">
                All Food
            </span>
        </a>
    </div>
</nav>
