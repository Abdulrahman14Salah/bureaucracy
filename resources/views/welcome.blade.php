@extends('layouts.app')
@section('content')
<div class="bg-white rounded-xl shadow p-8">
    <h2 class="text-3xl font-bold mb-3">Case Management SaaS</h2>
    <p class="text-slate-600 mb-6">Collaborate with admins, upload files, and track progress in one secure portal.</p>
    <div class="space-x-3">
        <a href="{{ route('login') }}" class="px-4 py-2 bg-slate-900 text-white rounded">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-cyan-600 text-white rounded">Register</a>
    </div>
</div>
@endsection
