<x-layout>
    <div>
        <h1 class="my-3 ml-3 text-[20px] font-bold">Riwayat Pembelian</h1>
        <div class="text-center">
            <div class="grid grid-cols-3">
                <div class="border-[1px] border-black font-bold">Nama</div>
                <div class="border-y-[1px] border-black font-bold">Jumlah Pembelian</div>
                <div class="border-[1px] border-black font-bold">Harga</div>
            </div>
        @if ($paginatedHistories)
            @foreach ($paginatedHistories as $history)
                <div class="grid grid-cols-3">
                    <div class="border-[1px] border-black text-black no-underline">{{ $history['item_name'] }}</div>
                    <div class="border-y-[1px] border-black">{{ $history['quantity'] }}</div>
                    <div class="border-[1px] border-black">{{ $history['total_price'] }}</div>
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