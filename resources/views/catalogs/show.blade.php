<x-layout>
    <h1 class="my-3 ml-3 text-[18px] md:text-[21px] lg:text-[23px] font-bold">Detail Barang</h1>
    <div class="ml-3 my-4">
        <div class="mb-1">
            <div class="font-bold pb-1 text-[15px] md:text-[18px] lg:text-[20px]">Nama Barang:  </div>
            <div class="text-[15px] md:text-[18px] lg:text-[20px]">{{ $item['nama'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1 text-[15px] md:text-[18px] lg:text-[20px]">Stok Barang:  </div>
            <div class="text-[15px] md:text-[18px] lg:text-[20px]">{{ $item['stok'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1 text-[15px] md:text-[18px] lg:text-[20px]">Harga Barang:  </div>
            <div class="text-[15px] md:text-[18px] lg:text-[20px]">{{ $item['harga'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1 text-[15px] md:text-[18px] lg:text-[20px]">Perusahaan Pembuat:  </div>
            <div class="text-[15px] md:text-[18px] lg:text-[20px]">{{ $companyName }}</div>
        </div>
    </div>

    <a href="{{ route('purchaseItem', ['id' => $item['id']]) }}" class="bg-black inline-flex gap-x-2 p-2 ml-2 rounded-lg">
        <div class="text-white">Beli Barang</div>
        <i class="bi bi-chevron-compact-right text-white"></i>
    </a>
</x-layout>