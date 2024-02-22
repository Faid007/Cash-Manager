<div class="flex items-center justify-between flex-shrink-0 px-3">
    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2">
        <img src="https://i.ibb.co/f4b1zWv/Picsart-24-02-22-00-06-15-783.png" alt="00000" width="50px">
            <h1 class="font-bold"> CM RPL </h1>
        <span class="sr-only">Dashboard</span>
    </a>

    <!-- Toggle button -->
    <x-button type="button" icon-only sr-text="Toggle sidebar" variant="secondary"
        x-show="isSidebarOpen || isSidebarHovered" x-on:click="isSidebarOpen = !isSidebarOpen">
        <x-icons.menu-fold-right x-show="!isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />

        <x-icons.menu-fold-left x-show="isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />

        <x-heroicon-o-x aria-hidden="true" class="w-6 h-6 lg:hidden" />
    </x-button>
</div>
