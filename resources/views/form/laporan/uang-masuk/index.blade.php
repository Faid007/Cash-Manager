<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Laporan Uang Masuk
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Bualn
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nominal
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Aksi
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporanUangMasuk as $laporan)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $laporan->bulan }}
                            </th>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($laporan->total_nominal, 0, ',', '.') }}
                            </td>
                            {{-- <td class="px-6 py-4">
                                <a href="{{ route('laporan-masuk.show') }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
