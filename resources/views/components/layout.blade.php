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
            <div class="flex gap-5 justify-between text-[17px] items-center">
                <a href="{{ route('purchaseHistory', ['user_id' => auth()->user()->id]) }}">Riwayat Pembelian</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="border border-white p-2">Logout</button>
                </form>
            </div>
        @else
            <div class="flex gap-5 justify-between text-[17px]">
                <a href="/register" class="no-underline text-white font-bold">Register</a>
                <a href="/login" class="no-underline text-white font-bold">Login</a>
            </div>
        @endauth
    </nav>
    <main class="mx-3 my-2">
        {{ $slot }}
    </main>
</body>
</html>