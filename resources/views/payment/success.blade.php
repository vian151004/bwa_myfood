<x-layouts.app>
    <div class="grid h-screen place-content-center bg-white font-poppins">
        <img src="{{ asset('assets/icons/checkmark-icon.svg') }}" alt="Tidak ada data"
            class="w-full overflow-hidden rounded-3xl" />
        <div class="mt-4 w-full text-center">
            <p class="text-lg font-semibold text-black-80">
                Transaksi Berhasil
            </p>
            <p class="mt-2 text-sm font-medium text-black-50">
                Terima kasih telah melakukan transaksi
            </p>
            <a href="/" wire:navigate
                class="mt-4 flex w-full items-center justify-center gap-2 rounded-full bg-primary-50 px-6 py-3 font-semibold text-black-10">
                Kembali ke Menu
            </a>
        </div>
    </div>
</x-layouts.app>
