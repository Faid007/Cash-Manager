<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Edit Uang Masuk
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <form action=" {{ url("/keluar/uang-keluar/edit/$uangKeluar->id") }} " method="post">
            @csrf
            <div class="mb-5">
                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Kategori</label>
                <select name="kategori" id="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" @if ($kategori->id == $uangKeluar->kategori_id) selected @endif>
                            {{ $kategori->name }}</option>
                    @endforeach
                </select>

                <label for="nominal" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nominal (Rp)</label>
                <input type="number" id="nominal" name="nominal" value={{ $uangKeluar->nominal }}
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />

                <label for="keterangan" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" value="{{ $uangKeluar->keterangan }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />

                <label for="tanggal" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ $uangKeluar->tanggal }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />

            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                Perubahan</button>
        </form>
    </div>
</x-app-layout>
