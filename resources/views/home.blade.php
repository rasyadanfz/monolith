<x-layout>
    <div class="ms-2">
        @auth
            <h1 class="font-bold text-[20px] md:text-[24px] lg:text-[28px]">Welcome, {{ auth()->user()->first_name . " " . auth()->user()->last_name}}</h1>
            <p class="text-[15px] md:text-[18px] lg:text-[22px]">Tekan tombol di bawah untuk melihat barang-barang yang tersedia</p>
        @else
            <h1 class="font-bold text-[20px] md:text-[24px] lg:text-[28px]">Welcome</h1>
            <p class="text-[15px] md:text-[18px] lg:text-[22px]">Silakan melakukan register/login</p>
            <p class="text-[15px] md:text-[18px] lg:text-[22px]">Atau tekan tombol di bawah untuk melihat barang-barang yang tersedia</p>
        @endauth
        <a href="{{ route ('catalogs') }}" class="inline-flex gap-2 no-underline text-white bg-black p-2 mt-2 rounded ">
            <div>Lihat Barang</div>
            <i class="bi bi-chevron-compact-right"></i>
        </a>
    </div>
</x-layout>