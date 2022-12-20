@php
    $no = 1;
@endphp

{{-- Delete Confirmation Modal Box --}}
@foreach ($products as $product)
    <div id="delete-modal-{{ $product['id'] }}" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="delete-modal-{{ $product['id'] }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin ingin menghapus
                        <b>{{ $product['productName'] }}</b> dari daftar produk?
                    </h3>
                    <form action={{ route('product.delete', ['id' => $product['id']]) }} method="post"
                        class="inline-flex items-center">
                        @method('delete')
                        @csrf
                        <button data-modal-toggle="delete-modal-{{ $product['id'] }}" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                            Yes
                        </button>
                    </form>

                    <button data-modal-toggle="delete-modal-{{ $product['id'] }}" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Produk') }}
            </h2>

            <a href={{ route('product.form.tambah') }}>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
            </a>
        </div>
    </x-slot>

    @if (session()->has('Message'))
        <div id="alert-3" class="flex p-4 mx-4 mt-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session()->get('Message') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    #
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama Produk
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Harga
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Modal
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Kategori
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Stock
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Satuan
                                </th>
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        @if ($products->isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="8" class="p-5 italic text-center">Daftar Produk Kosong</td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $product['productName'] }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ number_format($product['productPrice']) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ number_format($product['productModal']) }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $product->category->categoryName }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $product['inStock'] }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $product->unit->unitName }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="text-center flex items-center">
                                                <a href={{ route('product.form.edit', ['id' => $product['id']]) }}
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                                <button
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4"
                                                    type="button"
                                                    data-modal-toggle="delete-modal-{{ $product['id'] }}">Hapus</button>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
