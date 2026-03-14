<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Client Portal') }}</title>
    <script defer src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 text-slate-900">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-slate-900 text-white p-6 hidden md:block">
            <h1 class="text-xl font-semibold mb-6">Client Portal</h1>
            <nav class="space-y-2 text-sm">
                <a class="block hover:text-cyan-300" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="block hover:text-cyan-300" href="{{ route('cases.index') }}">My Cases</a>
                <a class="block hover:text-cyan-300" href="{{ route('documents.index') }}">Documents</a>
                <a class="block hover:text-cyan-300" href="{{ route('client.tasks.index') }}">Tasks</a>
                <a class="block hover:text-cyan-300" href="{{ route('admin.dashboard') }}">Admin</a>
            </nav>
        </aside>
        <main class="flex-1 p-6">
            @if(session('status'))
                <div class="mb-4 rounded bg-emerald-100 text-emerald-700 p-3">{{ session('status') }}</div>
            @endif
            {{ $slot ?? '' }}
            @yield('content')
        </main>
    </div>
</body>
</html>
