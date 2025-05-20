<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Cloud Wings') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen">

<div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden md:block">
        <div class="p-6 text-2xl font-bold text-indigo-400">Cloud Wings</div>
        <nav class="p-4 space-y-2 text-sm">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-800 bg-gray-800">
                🏠 <span class="ml-2">Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded hover:bg-gray-800">
                📦 <span class="ml-2">Stacks</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded hover:bg-gray-800">
                📝 <span class="ml-2">Pedidos</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded hover:bg-gray-800">
                💼 <span class="ml-2">Plano</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-6 px-3">
                @csrf
                <button class="w-full text-left py-2 hover:bg-red-600 bg-red-500 rounded">🚪 Sair</button>
            </form>
        </nav>
    </aside>

    <!-- Conteúdo -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Topbar -->
        <header class="bg-white dark:bg-gray-800 shadow px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-semibold text-indigo-700 dark:text-indigo-300">Painel do Cliente</div>
            <div class="flex items-center gap-4">
                <!-- Botão Tema -->
                <button id="theme-toggle" class="text-gray-700 dark:text-white hover:text-indigo-500 transition">
                    <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-8.66l-.71.71M4.34 4.34l-.71.71m16.97 0l-.71-.71M4.34 19.66l-.71-.71M21 12h1M2 12H1m10-5a5 5 0 000 10a5 5 0 000-10z" />
                    </svg>
                    <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293a8 8 0 01-10.586-10.586a8.001 8.001 0 1010.586 10.586z" />
                    </svg>
                </button>

                <span class="text-sm text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-500 hover:underline" type="submit">Sair</button>
                </form>
            </div>
        </header>

        <!-- Conteúdo dinâmico -->
        <main class="flex-1 overflow-y-auto p-6">
            {{ $slot }}
        </main>
    </div>
</div>

<!-- Script: Toggle Dark Mode -->
<script>
    const toggle = document.getElementById('theme-toggle');
    const html = document.documentElement;
    const iconSun = document.getElementById('icon-sun');
    const iconMoon = document.getElementById('icon-moon');

    function updateThemeIcon() {
        if (html.classList.contains('dark')) {
            iconSun.classList.remove('hidden');
            iconMoon.classList.add('hidden');
        } else {
            iconSun.classList.add('hidden');
            iconMoon.classList.remove('hidden');
        }
    }

    // Carrega tema salvo
    if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
    }
    updateThemeIcon();

    toggle.addEventListener('click', () => {
        html.classList.toggle('dark');
        localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        updateThemeIcon();
    });
</script>

</body>
</html>
