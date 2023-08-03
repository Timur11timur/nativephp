<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NativePHP</title>
    @vite('resources/js/app.js')
    <style>
        body.dark {
            background-color: #222;
            color: white;
        }
        body.dark a {
            color: lightblue;
        }
    </style>
</head>
<body class="{{ $theme }}">
    <div><a href="/about">About</a></div>
    <div><a href="/?openwindow=true">Open Window</a></div>
    <div><a href="/?notification=true">Notification</a></div>
    <div><a href="/settings">Settings</a></div>
    <div>Theme: {{ $theme }}</div>
    <div>Hi!</div>
    <div>
        <div>
            <form action="/user" method="POST">
                @csrf
                <button type="submit">Create User</button>
            </form>
        </div>
    </div>
    <div>
        <div>
            @forelse($users as $user)
                <div>{{ $user->name }}</div>
            @empty
                <div>No users found</div>
            @endforelse
        </div>
    </div>
</body>
</html>