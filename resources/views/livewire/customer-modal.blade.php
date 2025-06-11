<x-modal :title="'Lengkapi Pemesanan'" :showClose="false">
    @section('content')
        <form wire:submit.prevent="saveUserInfo">
            <div class="mb-6 mt-4 space-y-4">
                <div class="flex flex-col space-y-1">
                    <label class="text-xs font-semibold text-black-50" for="name">
                        Nama Pemesan
                    </label>
                    <input
                        class="{{ $errors->has('name') ? 'border-red-500' : 'border-black-30' }} rounded-lg border px-2 py-1.5"
                        type="text" name="name" wire:model.live="name" />
                    @error('name')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-1">
                    <label class="text-xs font-semibold text-black-50" for="phone">
                        Nomor Handphone
                    </label>
                    <input
                        class="{{ $errors->has('name') ? 'border-red-500' : 'border-black-30' }} rounded-lg border px-2 py-1.5"
                        type="tel" name="phone" wire:model.live="phone" />
                    @error('phone')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button x-on:click="open = false" type="button"
                    class="cursor-pointer rounded-full bg-primary-10 px-5 py-2 font-semibold text-primary-60 outline-none hover:bg-primary-20">
                    Kembali
                </button>
                <button x-on:click="open = {{ $errors->has('name') || $errors->has('phone') ? 'true' : 'false' }}"
                    type="submit"
                    class="cursor-pointer rounded-full bg-primary-50 px-5 py-2 font-semibold text-white hover:bg-primary-60">
                    <span class="flex items-center gap-1.5">
                        Terapkan
                        <img src="{{ asset('assets/icons/arrow-right-white-icon.svg') }}" alt="Terapkan" />
                    </span>
                </button>
            </div>
        </form>
    @endsection
</x-modal>
