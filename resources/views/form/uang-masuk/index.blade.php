<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Uang Masuk
            </h2>

            <x-button href="{{ route('masuk.add') }}" variant="purple" class="items-center max-w-xs gap-2">
                <span>Tambah</span>
            </x-button>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nominal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uangMasuks as $uangMasuk)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $uangMasuk->kategori->name }}
                            </th>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($uangMasuk->nominal, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $uangMasuk->keterangan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $uangMasuk->tanggal }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                    <a href="{{ url("/masuk/uang-masuk/tambah/$uangMasuk->id") }}">
                                        <button type="submit"
                                            class="text-white bg-purple-400 focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-xm px-2 py-1 text-center me-2 mb-2">Edit</button>
                                    </a>

                                    <form action=" {{ url("/masuk/uang-masuk/hapus/$uangMasuk->id") }} " method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')"
                                            class="text-white bg-purple-400 focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-xm px-2 py-1 text-center me-2 mb-2">Hapus</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
