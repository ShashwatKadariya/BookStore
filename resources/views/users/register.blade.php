<x-layout>
    <div class="max-w-lg mx-auto mt-24 font-bold text-4xl">
        Register
    </div>
    <x-card class="max-w-lg mx-auto mt-10">
        <form method="POST" action="/users">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" name="name" class="border border-gray rounded p-2 w-full"
                value="{{old('name')}}">
                
                @error('name')
                    <p class="text-red text-xs mt-1">*{{$message}}</p>
                @enderror

            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" name="email" class="border border-gray rounded p-2 w-full"
                value="{{old('email')}}">

                @error('email')
                    <p class="text-red text-xs mt-1">*{{$message}}</p>
                @enderror

            </div>
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input type="password" name="password" class="border border-gray rounded p-2 w-full">

                @error('password')
                    <p class="text-red text-xs mt-1">*{{$message}}</p>
                @enderror

            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" class="border border-gray rounded p-2 w-full">

                @error('password_confirmation')
                    <p class="text-red text-xs mt-1">*{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-black text-white rounded py-2 px-4 hover:bg-gray">Sign Up</button>
            </div>
            <div class="mt-8">
                <p>
                    Already have an account?
                    <a href="/login" class="text-black underline">Login</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>