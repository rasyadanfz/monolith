<x-layout>
    <div>
        <h1 class="ml-3 mt-2 mb-4 font-bold text-[20px]">Daftar Barang</h1>
        <div class="text-center">
            <div class="grid grid-cols-3">
                <div class="border-[1px] border-black font-bold">Nama</div>
                <div class="border-y-[1px] border-black font-bold">Stok</div>
                <div class="border-[1px] border-black font-bold">Harga</div>
            </div>
        @if ($paginatedItems)
            @foreach ($paginatedItems as $item)
                <div class="grid grid-cols-3">
                    <a href="{{ route('detailBarang', ['id' => $item['id']])}}" class="border-[1px] border-black text-black no-underline">{{ $item['nama'] }}</a>
                    <div class="border-y-[1px] border-black">{{ $item['stok'] }}</div>
                    <div class="border-[1px] border-black">{{ $item['harga'] }}</div>
                </div>
            @endforeach
            <div class="my-5 ">
                {{ $paginatedItems->links() }}
            </div>
        @else
                <div class="row py-1">
                    <div class="col-12 text-center">Tidak ada barang</div>
                </div>
        @endif
        </div>
    </div>
</x-layout>