<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex gap-4">
        <div
            class="block max-w-[200px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Saldo Kamu</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Tes</p>
        </div>

        <div
            class="block max-w-[200px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Uang Masuk</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">tes</p>
        </div>

        <div
            class="block max-w-[200px] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Uang Keluar</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">tes</p>
        </div>
    </div>



</x-app-layout>
