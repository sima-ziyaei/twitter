<!doctype html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" w-screen h-screen flex items-center justify-center ">

    <form method="POST" class="border border-solid border-blue-950">
        @csrf
        <div class="flex flex-col gap-4 my-4">
            <label for="name">name:</label>
            <input value="{{ old('name') }}" class=" border border-solid !border-black" type="text" id="name" title="name" name="name" />
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="my-4">
            <label for="password">password:</label>
            <input value="{{ old('password') }}" type="password" id="password" title="password" name="password" />
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="my-4">
            <label for="password_confirmation">confirm password:</label>
            <input value="{{ old('password_confirmation') }}" type="password" id="password_confirmation" title="password_confirmation" name="password_confirmation" />
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="my-4">
            <label for="email">email:</label>
            <input value="{{ old('email') }}" type="email" id="email" title="email" name="email" />
            @error('email') <span class="error">{{ $message }}</span> @enderror
        
        </div>

        <div  class="my-4">
            <label for="dateOfBirth">date of birth:</label>
            <input value="{{ old('dateOfBirth') }}" type="date" id="dateOfBirth" title="dateOfBirth" name="dateOfBirth" />
            @error('dateOfBirth') <span class="error">{{ $message }}</span> @enderror
        
        </div>
        <button type="submit">Submit</button>
        <a href={{URL::route('/')}}>Back</a>
    </form>
</body>
