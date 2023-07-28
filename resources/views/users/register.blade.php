<x-layout>
    <div class="flex justify-center mt-5">
        <form method="POST" action="/users" class="flex flex-col items-center">
            @csrf
            <div class="inline-flex flex-col">
                <label for="first_name" class="text-[14px] md:text-[18px] lg:text-[19px]">Nama Depan</label>
                <input type="text" name="first_name" id="first_name" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="last_name" class="text-[14px] md:text-[18px] lg:text-[19px]">Nama Belakang</label>
                <input type="text" name="last_name" id="last_name" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="username" class="text-[14px] md:text-[18px] lg:text-[19px]">Username</label>
                <input type="text" name="username" id="username" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="email" class="text-[14px] md:text-[18px] lg:text-[19px]">Email</label>
                <input type="email" name="email" id="email" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="password" class="text-[14px] md:text-[18px] lg:text-[19px]">Password</label>
                <input type="password" name="password" id="password" class="border border-black">
            </div>
            <div class="inline-flex flex-col">
                <label for="password_confirmation" class="text-[14px] md:text-[18px] lg:text-[19px]">Konfirmasi Password</label>
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
            <div class="text-black flex flex-col md:flex-row gap-x-1 justify-center items-center mt-2">
                Sudah punya akun? <a href="/login" class="underline font-bold">Login</a>
            </div>
        </form>
    </div>
</x-layout>