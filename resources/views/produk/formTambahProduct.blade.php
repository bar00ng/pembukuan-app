<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action={{ route('product.store') }} method="POST">
                        @csrf
                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white {{ $errors->first('productName') ? 'text-red-700' : '' }}">Nama
                                Barang</label>
                            <input type="text"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light {{ $errors->first('productName') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : '' }}"
                                name="productName" value="{{ old('productName') }}" required>
                            @if ($errors->first('productName'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                        class="font-medium">{{ $errors->first('productName') }}</p>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white {{ $errors->first('productPrice') ? 'text-red-700' : '' }}">Harga
                                Jual</label>
                            <input type="number" name="productPrice"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light {{ $errors->first('productPrice') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : '' }}"
                                required value="{{ old('productPrice') }}">
                            @if ($errors->first('productPrice'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                        class="font-medium">{{ $errors->first('productPrice') }}</p>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white {{ $errors->first('productModal') ? 'text-red-700' : '' }}">Harga
                                Modal (Tidak
                                Wajib)</label>
                            <input type="number" name="productModal"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light {{ $errors->first('productModal') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : '' }}"
                                value="{{ old('productModal') }}">
                            @if ($errors->first('productModal'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                        class="font-medium">{{ $errors->first('productModal') }}</p>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? ' selected' : ' ' }}>
                                        {{ $category->categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-6">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white {{ $errors->first('inStock') ? 'text-red-700' : '' }}">Stock</label>
                                <input type="number" name="inStock"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light {{ $errors->first('inStock') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : '' }}"
                                    required value="{{ old('inStock') }}">
                                @if ($errors->first('inStock'))
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">{{ $errors->first('inStock') }}</p>
                                @endif
                            </div>
                            <div class="mb-6">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                                <select name="unit_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ old('unit_id') == $unit->id ? ' selected' : ' ' }}>
                                            {{ $unit->unitName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
