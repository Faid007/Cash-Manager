<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    {{-- Start Dashboard --}}
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    {{-- End Dashboard --}}

    {{-- Start kategori --}}
    <x-sidebar.link title="Kategori" href="{{ route('kategori') }}" :isActive="request()->routeIs('kategori')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    {{-- End kategori --}}

    {{-- Start Uang Masuk --}}
    <x-sidebar.dropdown title="Uang Masuk" :active="Str::startsWith(request()->route()->uri(), 'masuk')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Uang Masuk" href="{{ route('masuk.index') }}" :active="request()->routeIs('masuk.index')" />
    </x-sidebar.dropdown>
    {{-- End Uang Masuk --}}

    {{-- Start Uang Keluar --}}
    <x-sidebar.dropdown title="Uang Keluar" :active="Str::startsWith(request()->route()->uri(), 'keluar')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
        {{-- 
        <x-sidebar.sublink title="Kategori" href="{{ route('kategori-keluar.index') }}" :active="request()->routeIs('kategori-keluar.index')" /> --}}
        <x-sidebar.sublink title="Uang Keluar" href="{{ route('keluar.index') }}" :active="request()->routeIs('keluar.index')" />
    </x-sidebar.dropdown>
    {{-- End Uang Keluar --}}

    {{-- Start Laporan --}}
    <x-sidebar.dropdown title="Laporan" :active="Str::startsWith(request()->route()->uri(), 'laporan')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Uang Masuk" href="{{ route('laporan-masuk.index') }}" :active="request()->routeIs('masuk.index')" />
        <x-sidebar.sublink title="Uang Keluar" href="{{ route('laporan-keluar.index') }}" :active="request()->routeIs('keluar.index')" />
    </x-sidebar.dropdown>
    {{-- End Laporan --}}




    {{-- Link --}}
    {{-- <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">
        Dummy Links
    </div>

    @php
        $links = array_fill(0, 20, '');
    @endphp

    @foreach ($links as $index => $link)
        <x-sidebar.link title="Dummy link {{ $index + 1 }}" href="#" />
    @endforeach --}}

</x-perfect-scrollbar>
