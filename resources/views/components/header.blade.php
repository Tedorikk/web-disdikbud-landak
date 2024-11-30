<!-- Bagian Fixed Header -->
<div id="fixedPart" class="top-0 sticky w-full z-20">
    <!-- Header Informasi -->
    <section id="headerInformations" class="flex flex-col sm:flex-row h-10 md:h-fit sm:h-10 items-center justify-between bg-slate-800 px-4 sm:px-24 py-2 sm:py-4 text-white">
        <div id="contactPerson" class="flex flex-row items-center gap-2 sm:gap-5 text-sm sm:text-base">
            <x-feathericon-phone />
            <span>
                Contact Person:
                <a href="https://wa.me/89694488847" class="underline underline-offset-2">+62 896 9448 8847</a>
            </span>
        </div>
        <div id="additionalInformation" class="mt-2 sm:mt-0 text-center sm:text-left text-sm sm:text-base">
            <span>Buka Jam: 09.00 - 15.00</span>
        </div>
    </section>

    <!-- Navigation Bar -->
    <section id="navigationBar" class="flex flex-col sm:flex-row items-center justify-between bg-white/75 backdrop-blur-sm border-b-2 border-slate-200 px-4 sm:px-24 py-4">
        <a href="{{ url('/') }}" id="NavigationBarLogo" class="flex flex-row gap-2 sm:gap-10 items-center">
            <div id="logoNav" class="h-12 sm:h-24">
                <img src="{{ url('/images/navigationBar/logo-640.png') }}" alt="LambangKabupatenLandak" class="h-full">
            </div>
            <div id="logoTypoGraphNav" class="text-sm sm:text-xl font-bold">
                <span>
                    Dinas Pendidikan dan Kebudayaan <br>
                    Kabupaten Landak
                </span>
            </div>
        </a>

        <div id="navigationBarButton" class="flex flex-wrap gap-4 sm:gap-10 mt-4 sm:mt-0 text-sm sm:text-base items-center">
            <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                {{ __('Beranda') }}
            </x-nav-link>

            <!-- Menampilkan Menu dan Submenu -->
            @foreach ($menus as $menu)
                <x-nav-link :href="route('page.show', $menu->slug)" :active="request()->routeIs($menu->slug)">
                    {{ $menu->name }} <!-- Use dynamic menu name here -->
                    @if ($menu->children->count())
                        <ul class="list-none p-0 m-0">
                            @foreach ($menu->children as $child)
                                <li class="inline-block mr-4">
                                    <a href="{{ route('page.show', $child->slug) }}" class="text-sm">{{ $child->name }}</a> <!-- Use dynamic child name here -->
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </x-nav-link>
            @endforeach

            <!-- Search Input -->
            <input type="text" name="cari" placeholder="Cari di Website..." class="border border-slate-400 rounded-xl py-2 px-3 w-full sm:w-64 focus:ring-2 focus:ring-slate-200">
        </div>
    </section>
</div>