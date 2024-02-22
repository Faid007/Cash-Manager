<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Kategori
            </h2>

            <x-button href="{{ route('kategori-masuk.add') }}" variant="purple" class="items-center max-w-xs gap-2">
                <span>Tambah Kategori</span>
            </x-button >
        </div>
    </x-slot>

    <div class="py-6">


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Kategori
                        </th>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $kategori)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $kategori->name }}
                            </th>
                            <td class="px-6 py-4">
                                <a href="{{ url("kategori/tambah/$kategori->id") }}">
                                    <button type="submit"
                                        class="text-white bg-purple-400 focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-xm px-2 py-1 text-center me-2 mb-2">Edit</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-3">
                {{ $kategoris->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
