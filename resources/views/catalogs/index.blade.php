<x-layout>
    <div>
        <h1 class="ml-3 mt-2 mb-4 font-bold text-[20px]">Daftar Barang</h1>
        <div>
            <form action="" class="flex border border-black justify-between p-1 px-3 mb-3 gap-x-3">
                <input type="search" name="search" id="search" placeholder="Cari nama barang" class="grow">
                <button aria-label="search">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
        <div class="mb-2">
            <form action="" class="flex gap-x-3">
                <div>
                    <label for="sort_by">Sort By: </label>
                    <select name="sort_by" id="sort_by" class="border border-black rounded-lg p-0.5">
                        <option value="nama" {{$sortBy == 'nama' ? 'selected' : ''}}>Nama</option>
                        <option value="stok" {{$sortBy == 'stok' ? 'selected' : ''}}>Stok</option>
                        <option value="harga" {{$sortBy == 'harga' ? 'selected' : ''}}>Harga</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="border border-black rounded-lg py-0.5 px-3">Sort</button>
                </div>
            </form>
        </div>
        <div class="text-center">
            <div class="grid grid-cols-4">
                <div class="border-[1px] text-[14px] md:text-[17px] lg:text-[20px] border-black font-bold col-span-2">Nama</div>
                <div class="border-y-[1px] text-[14px] md:text-[17px] lg:text-[20px] border-black font-bold">Stok</div>
                <div class="border-[1px] text-[14px] md:text-[17px] lg:text-[20px] border-black font-bold">Harga</div>
            </div>
        @if ($paginatedItems)
            
            @foreach ($paginatedItems as $item)
                <div class="grid grid-cols-4">
                    <a href="{{ route('detailBarang', ['id' => $item['id']])}}" class="border-[1px] border-black text-black no-underline text-[13px] md:text-[16px] lg:text-[19px] col-span-2 p-1">{{ $item['nama'] }}</a>
                    <div class="border-y-[1px] border-black text-[13px] md:text-[16px] lg:text-[19px] p-1">{{ $item['stok'] }}</div>
                    <div class="border-[1px] border-black text-[13px] md:text-[16px] lg:text-[19px] p-1">{{ $item['harga'] }}</div>
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