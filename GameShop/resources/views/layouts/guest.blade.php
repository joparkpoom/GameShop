<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://accounts.google.com/gsi/client"></script>

    <!-- Styles -->
    @livewireStyles

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BH1VFNB7M0"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BH1VFNB7M0');
    </script>
    <title>GameShop | 30M</title>
</head>

<body class="min-h-screen bg-black antialiased">
    <div
        class="relative min-h-screen bg-[radial-gradient(1100px_600px_at_95%_0%,rgba(220,38,38,0.16),transparent_70%),radial-gradient(900px_600px_at_0%_90%,rgba(15,23,42,0.1),transparent_72%)]">
        <header class="mx-auto w-full max-w-7xl px-4 pt-6 sm:px-6 lg:px-8">
            <div
                class="flex items-center justify-between rounded-2xl border border-white/70 bg-white/80 px-5 py-4 shadow-sm backdrop-blur-sm sm:px-7">
                <div class="flex items-center gap-3">
                    <p class="text-sm font-bold uppercase tracking-[0.18em] text-black">GAMESHOP | <span class="text-red-500">30M</span></p>
                </div>


                <a href="{{ route('user.login') }}"
                    class="inline-flex items-center rounded-full bg-slate-900 px-5 py-2.5 text-xs font-bold uppercase tracking-[0.12em] text-white transition hover:bg-slate-700">
                    เข้าสู่ระบบ
                </a>
            </div>
        </header>

        <main class="mx-auto w-full px-4 pb-8 pt-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>
