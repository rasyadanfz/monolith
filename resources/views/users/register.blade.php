<x-layout>
    <div class="flex justify-center mt-5">
        <form method="POST" action="/users" class="flex flex-col items-center">
            @csrf
            <div class="inline-flex flex-col">
                <label for="first_name">Nama Depan</label>
                <input type="text" name="first_name" id="first_name" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="last_name">Nama Belakang</label>
                <input type="text" name="last_name" id="last_name" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="border border-black">
            </div>
            @error('username')
                <div class="text-red font-bold">{{ $message }}</div>
            @enderror
            @error('email')
                <div class="text-red font-bold">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="text-red font-bold">{{ $message }}</div>
            @enderror
            <div class="mt-3">
                <button type="submit" class="p-2 px-4 bg-black text-white border border-black rounded-lg">Register</button>
            </div>
        </form>
    </div>
</x-layout>