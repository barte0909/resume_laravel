@include('partials.header')
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('login_store') }}" method="POST" id="loginFrom">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Username" required>
                    
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <div>
                    </div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password" required>
                    <div class="form-group">

                        <div class="g-recaptcha mt-2 mb-2" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>
                <div class="flex items-center justify-between">
                    <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline
                    ">
                        Login
                    </button>

                    <a href="{{ route('ForgotPassword') }}" >Reset Password</a>


                </div>
            </form>
        </div>
    </div>



    <script>
        function onSubmit(token) {
          document.getElementById("loginFrom").submit();
        }


      </script>




@include('partials.footer')
