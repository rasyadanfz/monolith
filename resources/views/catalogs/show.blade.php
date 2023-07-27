<x-layout>
    <h1 class="my-3 ml-3 text-[20px] font-bold">Detail Barang</h1>
    <div class="ml-3 my-4">
        <div class="mb-1">
            <div class="font-bold pb-1">Nama Barang:  </div>
            <div class="">{{ $item['nama'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1">Stok Barang:  </div>
            <div class="">{{ $item['stok'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1">Harga Barang:  </div>
            <div class="">{{ $item['harga'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1">Perusahaan Pembuat:  </div>
            <div class="">{{ $companyName }}</div>
        </div>
    </div>

    <a href="{{ route('purchaseItem', ['id' => $item['id']]) }}" class="bg-black inline-flex gap-x-2 p-2 rounded-lg">
        <div class="text-white">Beli Barang</div>
        <i class="bi bi-chevron-compact-right text-white"></i>
    </a>
</x-layout>