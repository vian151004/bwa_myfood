<x-modal :title="'Filter'" :showClose="true">
    @section('content')
        <div class="space-y-2 pb-4 pt-2">
            @php
                $foodCategories = $categories->filter(function ($category) {
                    return str_contains(strtolower($category->name), 'food');
                });
            @endphp

            @if ($foodCategories->isNotEmpty())
                <div>
                    <p class="font-medium text-black-100">Makanan Daerah</p>
                    <div class="mt-2 flex flex-wrap space-x-2">
                        @foreach ($foodCategories as $category)
                            <label x-data="{
                                checked: {{ in_array($category->id, $selectedCategories) ? 'true' : 'false' }},
                            }" wire:key="category-food-{{ $category->id }}"
                                class="mb-1 whitespace-nowrap rounded-full px-2 py-1.5 text-xs font-medium"
                                :class="checked ? 'bg-primary-50 text-white' : 'bg-black-20 text-black-70'">
                                <input type="checkbox" class="hidden" wire:model="selectedCategories"
                                    value="{{ $category->id }}" x-on:change="checked = !checked" />
                                <span class="text-xs">
                                    {{ $category->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            @php
                $nonFoodCategories = $categories->filter(function ($category) {
                    return !str_contains(strtolower($category->name), 'food');
                });
            @endphp

            @if ($nonFoodCategories->isNotEmpty())
                <div>
                    <p class="font-medium text-black-100">Type F&B</p>
                    <div class="mt-2 flex flex-wrap space-x-2">
                        @foreach ($nonFoodCategories as $category)
                            <label x-data="{
                                checked: {{ in_array($category->id, $selectedCategories) ? 'true' : 'false' }},
                            }" wire:key="category-other-{{ $category->id }}"
                                class="mb-1 whitespace-nowrap rounded-full px-2 py-1.5 text-xs font-medium"
                                :class="checked ? 'bg-primary-50 text-white' : 'bg-black-20 text-black-70'">
                                <input type="checkbox" class="hidden" wire:model="selectedCategories"
                                    value="{{ $category->id }}" x-on:change="checked = !checked" />
                                <span class="text-xs">
                                    {{ $category->name }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <button type="button" x-on:click="$wire.resetFilter()"
                class="cursor-pointer rounded-full bg-primary-10 px-5 py-2 font-semibold text-primary-60 outline-none hover:bg-primary-20">
                Reset
            </button>
            <button x-on:click="
                    $wire.applyFilter()
                    open = false
                "
                type="button"
                class="cursor-pointer rounded-full bg-primary-50 px-5 py-2 font-semibold text-white hover:bg-primary-60">
                <span class="flex items-center gap-1.5">
                    Terapkan
                    <img src="{{ asset('assets/icons/arrow-right-white-icon.svg') }}" alt="Terapkan" />
                </span>
            </button>
        </div>
    @endsection
</x-modal>
