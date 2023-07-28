<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content='Monolithic website to buy various items'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Monolith</title>
</head>
<body>
    <nav class="flex justify-between items-center px-4 py-3 bg-black text-white">
        <a href="/" class="font-bold text-[25px]">Monolith</a>
        @auth
            <div class="gap-5 justify-between text-[17px] items-center hidden md:flex">
                <a href="{{ route('purchaseHistory') }}">Riwayat Pembelian</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="border border-white p-2">Logout</button>
                </form>
            </div>
            <div class="md:hidden flex flex-col">
                <div class="text-right">
                    <i class="bi bi-list dropdown"></i>
                </div>
            </div>
        @else
            <div class="gap-5 justify-between text-[17px] hidden md:flex">
                <a href="/register" class="no-underline text-white font-bold">Register</a>
                <a href="/login" class="no-underline text-white font-bold">Login</a>
            </div>
            <div class="md:hidden">
                <div>
                    <i class="bi bi-list dropdown"></i>
                </div>
            </div>
        @endauth
    </nav>
    @auth
    <div class="md:hidden">
        <div class="hidden dropdown-menu flex flex-col gap-2 justify-center px-4 pb-4 bg-black text-white">
            <a href="{{ route('purchaseHistory') }}">Riwayat Pembelian</a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="border border-white p-1.5">Logout</button>
            </form>
        </div>
    </div>
    @else
    <div class="md:hidden">
        <div class="hidden dropdown-menu flex flex-col gap-2 justify-center px-4 pb-4 bg-black text-white">
            <a href="/register" class="no-underline text-white">Register</a>
            <a href="/login" class="no-underline text-white">Login</a>
        </div>
    </div>
    @endauth
    <main class="mx-3 my-2">
        {{ $slot }}
    </main>
    <script>
        const btn = document.querySelector('.dropdown');
        const menu = document.querySelector('.dropdown-menu');
        btn.addEventListener('click', () => {menu.classList.toggle("hidden")})
    </script>
</body>
</html>