<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <main style="max-width: 720px; margin: 48px auto; font-family: sans-serif;">
        <h1>User Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>

        <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </main>
</body>
</html>
