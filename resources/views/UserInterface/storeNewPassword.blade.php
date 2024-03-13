@include('partials.header')


<div class="flex justify-center align-center mt-28">
    <h1 class=" font-serif text-4xl mt-10 shado">Reset your Password</h1>
</div>
        <form action="{{ route('updatePassword')}}" method="POST" class="max-w-sm mx-auto">
            @csrf
            @method('POST')
            <input type="hidden" name="email" value="{{$email}}">
            <div class="bg-red-600 rounded px-7 py-7 mt-4 text-white ">
                <div class="mb-4">
                    <label for="password" class="block">Password</label>
                    <input type="password"  placeholder="Password" name="password"
                           class=" text-gray-950 border border-gray-300 rounded-md px-4 py-2 w-full @error('email') border-red-500 @enderror">
                    @error('password')
                    <p class="text-white text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="confirmPassword" class="block">Confirm Password</label>
                    <input type="password" id="password" name="confirmPassword" placeholder="Confirm Password"
                           class=" text-gray-950 border border-gray-300 rounded-md px-4 py-2 w-full @error('password') border-red-500 @enderror">
                    @error('confirmPassword')
                    <p class="text-white text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-500">Reset Password</button>
            </div>
        </form>






@include('partials.footer')
