<x-modal :title="''" :showClose="false">
    @section('content')
        <div class="mb-4 flex flex-col items-center">
            <img src="{{ asset('assets/icons/warning-icon.svg') }}" alt="Warning" />
            <p class="my-4 text-center text-2xl font-semibold text-black-80">
                Kamu yakin ingin menghapus makanan?
            </p>
        </div>
        <div class="flex items-center justify-between gap-4">
            <button x-on:click="open = false" type="button"
                class="w-1/2 cursor-pointer rounded-full bg-primary-10 px-5 py-2 font-semibold text-primary-60 outline-none hover:bg-primary-20">
                Kembali
            </button>
            <button type="submit" x-on:click="$wire.$parent.deleteSelected() open = false"
                class="w-1/2 cursor-pointer rounded-full bg-primary-50 px-5 py-2 font-semibold text-white hover:bg-primary-60">
                Yakin
            </button>
        </div>
    @endsection
</x-modal>
