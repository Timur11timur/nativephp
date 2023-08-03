<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div><a href="/">Home</a></div>
    <div>Settings page</div>
    <div>
        <form action="/settings" method="POST">
            @csrf
            <fieldset>
                <legend>Select your theme</legend>
                <div>
                    <input type="radio" id="light" name="theme" value="light" @checked(($theme === 'light') || ($theme === 'default'))>
                    <label for="light">Light</label>
                </div>

                <div>
                    <input type="radio" id="dark" name="theme" value="dark" @checked($theme === 'dark')>
                    <label for="dark">Dark</label>
                </div>
            </fieldset>

            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>