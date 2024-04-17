<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>

        @checkRole('admin')
            <button type="button" onclick="addCardModal.show()"
                class="flex justify-center items-center px-4 py-3 gap-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-bold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <svg class="dark:text-gray-800 text-gray-200" width="16" height="16" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
                Add Product
            </button>

            <dialog id="addCardModal">
                <div class="w-screen h-screen fixed inset-0 bg-black/50 grid place-items-center text-white z-10">
                    <div class="w-[25%] relative bg-gray-800 pb-24 px-6 pt-8 rounded">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <p class="block font-medium text-lg text-gray-700 dark:text-gray-300" for="email">
                                Add new Product!
                            </p>

                            <!-- Name -->
                            <div class="mt-6">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Price -->
                            <div class="mt-6">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                                    :value="old('price')" required autofocus autocomplete="number" />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <!-- Stock Quantity -->
                            <div class="mt-6">
                                <x-input-label for="stock" :value="__('Stock Quantity')" />
                                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                                    :value="old('stock')" required autofocus autocomplete="number" />
                                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                            </div>

                            <x-primary-button class="absolute right-6 bottom-7 mt-5">
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </form>
                        <form method="dialog" class="absolute left-6 bottom-7 mt-5">
                            <x-danger-button>{{ __('Cancel') }}</x-danger-button>
                        </form>
                    </div>
                </div>
            </dialog>
        @endCheckRole
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in Products!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
