@include('partials.header')
<div class="flex justify-center align-center">
    <h1 class=" font-serif text-4xl mt-28 ">Enter your Email to Reset your Password</h1>
</div>
<form action="{{ route('ForgotPassword')}}" method="POST" class="max-w-sm mx-auto shadow-md">
    @csrf
    @method('POST')
    <div class="bg-red-600 rounded px-7 py-7 mt-4 text-white ">
        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" id="email" placeholder="Email" name="email"
                   class=" text-gray-950 border border-gray-300 rounded-md px-4 py-2 w-full @error('email') border-red-500 @enderror">
            @error('email')
            <p class="text-white text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
           <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-500">Reset Password</button>
    </div>
</form>

@include('partials.footer')
