@php
    $modal = $total = $keuntungan = 0;
@endphp

{{-- Tambah Barang Modal Box --}}
<div id="produk-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Daftar Barang
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="produk-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Product name
                            </th>
                            <th scope="col" class="py-3 px-6">

                            </th>
                        </tr>
                    </thead>
                    @if ($products->isEmpty())
                        <tbody>
                            <tr>
                                <td colspan="2" class="p-5 italic text-center">Daftar Produk Kosong</td>
                            </tr>
                        </tbody>
                    @else
                        @foreach ($products as $product)
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="py-2 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bold">
                                        {{ $product['productName'] }}
                                    </th>
                                    <td class="py-2 px-4 text-right">
                                        <a href={{ route('addBarang',['id'=>$product->id, 'sessionName' => 'daftarBarang'.$data['id']]) }}>
                                            <button type="button"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 tambah-barang">Add</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pemasukan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-10">
                        <div class="overflow-x-auto relative">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 rounded-l-lg">
                                            Barang
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Jumlah
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Total
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session('daftarBarang'.$data['id']))
                                        @foreach (session('daftarBarang'.$data['id']) as $id => $details)
                                            @php
                                                $total += $details['price'] * $details['quantity'];
                                                $modal += $details['modal'] * $details['quantity'];
                                                $keuntungan = $total - $modal;
                                            @endphp
                                            <tr class="bg-white dark:bg-gray-800" data-id={{ $id }}>
                                                <th scope="row"
                                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $details['name'] }}
                                                </th>
                                                <td class="py-4 px-6">
                                                    <input type="number"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 update-barang quantity"
                                                        value={{ $details['quantity'] }}>
                                                </td>
                                                <td class="py-4 px-6">
                                                    {{ 'Rp. '.number_format($details['price'] * $details['quantity']) }}
                                                </td>
                                                <td>
                                                    <button
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4 remove-barang">Hapus</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="p-5 italic text-center">Daftar Barang Kosong</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr class="font-semibold text-gray-900 dark:text-white">
                                        <td colspan="7"><button type="button"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                data-modal-toggle="produk-modal">Tambah Barang</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <form action={{ route('income.patch',['id'=>$data['id']]) }} method="POST">
                        @method('patch')
                        @csrf
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                Pemasukan</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="number" name="totalPemasukan" id="total-pemasukan"
                                    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="0" value={{ session('daftarBarang'.$data['id']) ? $total : $data['totalPemasukan'] }}>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                Modal</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="number" name="hargaModal" id="harga-modal"
                                    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="0" value={{ session('daftarBarang'.$data['id']) ? $modal : $data['hargaModal'] }}>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keuntungan</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="number" name="keuntungan" id="keuntungan"
                                    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="0" value={{ session('daftarBarang'.$data['id']) ? $keuntungan : $data['keuntungan'] }} readonly>
                            </div>
                        </div>
                        <div class="mb-10">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <input type="radio" name="status" value=1
                                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                                        {{ $data['status'] == 1 ? 'checked' : ''}}>
                                    <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Lunas
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input type="radio" name="status" value=0
                                        class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                                        {{ $data['status'] != 1 ? 'checked' : ''}}>
                                    <label class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Tidak Lunas
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                            <textarea rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Opsional" name="description">{{$data['description'] ? $data['description']: ''}}</textarea>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            function hitungKeuntungan() {
                var pendapatan = $('#total-pemasukan').val();
                var modal = $('#harga-modal').val();
                var keuntungan = pendapatan - modal;

                $('#keuntungan').val(keuntungan);
            }

            $(".remove-barang").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Yakin ingin menghapus item?")) {
                    $.ajax({
                    url: "{{ route('removeBarang', 'daftarBarang'.$data['id']) }}",
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });

            $(".update-barang").change(function(e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: "{{ route('editBarang','daftarBarang'.$data['id']) }}",
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });

            $('#total-pemasukan').change(function(e) {
                e.preventDefault();

                hitungKeuntungan();
            });

            $('#harga-modal').change(function(e) {
                e.preventDefault();

                hitungKeuntungan();
            });
        </script>
    </x-slot>
</x-app-layout>
