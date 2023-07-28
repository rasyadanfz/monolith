<x-layout>
    <div>
        <h1 class="my-3 ml-3 text-[20px] font-bold">Riwayat Pembelian</h1>
        <div class="text-center">
            <div class="grid grid-cols-4">
                <div class="border-[1px] text-[14px] md:text-[17px] lg:text-[20px] border-black font-bold col-span-2">Nama</div>
                <div class="border-y-[1px] text-[12px] md:text-[15px] lg:text-[18px] border-black font-bold">Jumlah Pembelian</div>
                <div class="border-[1px] text-[14px] md:text-[17px] lg:text-[20px] border-black font-bold">Harga</div>
            </div>
        @if ($paginatedHistories)
            @foreach ($paginatedHistories as $history)
                <div class="grid grid-cols-4">
                    <div class="border-[1px] text-[13px] md:text-[16px] lg:text-[19px] border-black text-black no-underline col-span-2 p-1">{{ $history['item_name'] }}</div>
                    <div class="border-y-[1px] text-[13px] md:text-[16px] lg:text-[19px] border-black p-1">{{ $history['quantity'] }}</div>
                    <div class="border-[1px] text-[13px] md:text-[16px] lg:text-[19px] border-black p-1">{{ $history['total_price'] }}</div>
                </div>
            @endforeach
            <div class="my-5 ">
                {{ $paginatedHistories->links() }}
            </div>
        @else
                <div class="row py-1">
                    <div class="col-12 text-center">Tidak ada barang</div>
                </div>
        @endif
    </div>
</x-layout>