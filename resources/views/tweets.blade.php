<!doctype html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <form method="POST">
        @csrf

        <lable for="body">
            Body:
        </lable>
        <textarea name="body" id="body" title="body" placeholder="write a tweet"></textarea>
        
        <button type="submit">Tweet</button>

    </form>
    @foreach ($tweets as $tweet)
        <p>body: {{ $tweet->body }}</p>
    @endforeach
</body>
