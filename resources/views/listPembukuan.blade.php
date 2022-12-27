@foreach ($data as $day => $data_list)
    @foreach ($data_list as $d)
        {{-- Delete Confirmation Modal Box --}}
        <div id="delete-modal-{{ $d->id }}" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="delete-modal-{{ $d->id }}">
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
                            data?
                        </h3>
                        <form action={{ route('pembukuan.delete', ['id' => $d->id]) }} method="post"
                            class="inline-flex items-center">
                            @method('delete')
                            @csrf
                            <button data-modal-toggle="delete-modal-{{ $d->id }}" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                                Yes
                            </button>
                        </form>

                        <button data-modal-toggle="delete-modal-{{ $d->id }}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pembukuan') }}
            </h2>

            <div class="flex items-center space-x-5">
                <a href={{ route('pembukuan.tambahPemasukan') }}>
                    <button type="button"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">+ Pemasukan</button>
                </a>

                <a href={{ route('pembukuan.tambahPengeluaran') }}>
                    <button type="button"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">+ Pengeluaran</button>
                </a>
            </div>
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
                <div class="p-6">

                    <div class="overflow-x-auto relative sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Catatan
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Pemasukan
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Pengeluaran
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data->isEmpty())
                                    <tr>
                                        <td colspan="8" class="p-5 italic text-center">Daftar Pengeluaran Kosong</td>
                                    </tr>
                                @else
                                    @foreach ($data as $day => $data_list)
                                        <tr>
                                            <td colspan="10"
                                                class="py-4 px-6 text-gray-700 bg-gray-50 uppercase tracking-wide font-semibold">
                                                {{ $day }}
                                            </td>
                                        </tr>
                                        @foreach ($data_list as $d)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row"
                                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $d->description }}
                                                </th>
                                                <td class="py-4 px-6 font-bold text-green-500">
                                                    {{ 'Rp. ' . number_format($d->totalPemasukan) }}
                                                </td>
                                                <td class="py-4 px-6 font-bold text-red-500">
                                                    {{ 'Rp. ' . number_format($d->hargaModal) }}
                                                </td>
                                                <td class="py-4 px-6">
                                                    @if ($d->isPemasukan == 1)
                                                    <a href={{ route('pembukuan.editPemasukan', ['id' => $d->id]) }}
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>    
                                                    @else
                                                    <a href={{ route('pembukuan.editPengeluaran', ['id' => $d->id]) }}
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    @endif

                                                    <button
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4"
                                                        type="button"
                                                        data-modal-toggle="delete-modal-{{ $d->id }}">Hapus</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
