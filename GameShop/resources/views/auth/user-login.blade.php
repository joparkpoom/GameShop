<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login — GameShop</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gradient-to-br from-zinc-950 via-zinc-900 to-zinc-950 flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        {{-- Logo / Brand --}}
        <div class="text-center mb-8">
            <img src="{{ asset('storage/image/game_shop.png') }}" alt="GameShop Logo" class="mx-auto h-16 w-auto">
            <p class="mt-1 text-zinc-500 text-sm">Restricted access — users only</p>
        </div>

        {{-- Card --}}
        <div class="bg-zinc-900 border border-zinc-700 rounded-2xl shadow-2xl px-8 py-10">

            @if ($errors->any())
                <div class="mb-6 flex items-start gap-3 bg-red-500/10 border border-red-500/30 text-red-400 text-sm rounded-lg px-4 py-3">
                    <svg class="w-4 h-4 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('user.login.submit') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-300 mb-1.5">Email address</label>
                    <input
                        id="email" type="email" name="email"
                        value="{{ old('email') }}"
                        required autofocus
                        class="w-full rounded-lg bg-zinc-800 border border-zinc-700 text-white placeholder-zinc-500
                               px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent
                               transition @error('email') border-red-500 @enderror"
                        placeholder="admin@example.com"
                    >
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-zinc-300 mb-1.5">Password</label>
                    <input
                        id="password" type="password" name="password"
                        required
                        class="w-full rounded-lg bg-zinc-800 border border-zinc-700 text-white placeholder-zinc-500
                               px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent
                               transition"
                        placeholder="••••••••"
                    >
                </div>

                {{-- Remember me --}}
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember" value="1"
                           class="h-4 w-4 rounded border-zinc-700 bg-zinc-800 text-amber-500 focus:ring-amber-500">
                    <label for="remember" class="ml-2 text-sm text-zinc-500">Remember me</label>
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full py-2.5 px-4 rounded-lg bg-amber-500 hover:bg-amber-400 active:bg-amber-600
                           text-zinc-900 font-semibold text-sm transition focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 focus:ring-offset-zinc-900"
                >
                    Sign in as Admin
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-xs text-zinc-600">GameShop Admin &copy; {{ date('Y') }}</p>
    </div>

</body>
</html>
