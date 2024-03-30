<!doctype html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" w-screen h-screen flex items-center justify-center ">
    <div>
        <form method="POST" class="border border-solid border-blue-950">
            @csrf

            <div class="my-4">
                <label for="email">email:</label>
                <input value="{{ old('email') }}" type="email" id="email" title="email" name="email" />
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>

            <div class="my-4">
                <label for="password">password:</label>
                <input value="{{ old('password') }}" type="password" id="password" title="password" name="password" />
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit">Login</button>
        </form>
        @if($error)
            <p>{{$error}}</p>
        @endif
        <div class="mt-6">don't have an account? <a class="text-blue-300" href={{ URL::route('signup') }}>SignUp</a></div>
    </div>

</body>
