<x-layout>
    <h1 class="my-3 ml-3 text-[20px] font-bold">Beli Barang</h1>
    <div>
        <div class="ml-3 my-4">
        <div class="mb-1">
            <div class="font-bold pb-1">Nama Barang:  </div>
            <div class="">{{ $item['nama'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1">Harga:  </div>
            <div class="">{{ $item['harga'] }}</div>
        </div>
        <div class="mb-1">
            <div class="font-bold pb-1">Stok:  </div>
            <div class="">{{ $item['stok'] }}</div>
        </div>
        <form method="POST" action="/purchase">
            @csrf
            <label for="purchaseNum" class="font-bold mb-3">Jumlah Pembelian: </label>
            <input type="number" name="purchaseNum" id="purchaseNum" min="1" max="{{$item['stok']}}" class=" pl-2 border border-black" value="1" data-harga={{ $item['harga'] }}>
            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
            <div id="harga" class="font-bold mb-3">Total Harga: {{ $item['harga'] }}</div>
            @auth
                <button type="submit" class="flex gap-3 p-2 bg-black rounded-lg">
                    <div class="font-bold text-white">Beli</div>
                    <i class="bi bi-chevron-compact-right text-white"></i>
                </button>
            @else
                <a href="/login" class="text-[13px] md:text-[17px] lg:text-[19px]">Login untuk membeli barang</a>
            @endauth
        </form>
    </div>
</x-layout>

<script>
    const number = document.getElementById('purchaseNum');
    const hargaOutput = document.getElementById('harga');
    number.addEventListener('change', (e) => {
        if (e.target.value < 0) {
            hargaOutput.textContent = "Total Harga: " + 0;
        } else {
            const totalHarga = e.target.value * parseFloat(number.dataset.harga);
            hargaOutput.textContent = "Total Harga: " + totalHarga;
        }
    })
</script>