<x-layout>
    <div class="flex justify-center mt-5">
        <form method="POST" action="/login" class="flex flex-col items-center">
            @csrf
            <div class="inline-flex flex-col text-[14px] md:text-[18px] lg:text-[19px]">
                <label for="username/email">Username/Email</label>
                <input type="text" name="username/email" id="username/email" class="pl-2 border border-black">
            </div>
            <div class="inline-flex flex-col text-[14px] md:text-[18px] lg:text-[19px]">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="pl-2 border border-black">
            </div>
            
            <div class="mt-3">
                <button type="submit" class="p-2 px-4 bg-black text-white border border-black rounded-lg">Login</button>
            </div>
            <div class="text-black flex flex-col md:flex-row gap-x-1 justify-center items-center mt-2">
                Belum punya akun? <a href="/login" class="underline font-bold">Register</a>
            </div>
        </form>
    </div>
</x-layout>