@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Client Dashboard</h2>
<div class="grid lg:grid-cols-3 gap-4">
    <div class="bg-white rounded-xl p-4 shadow"><p class="text-sm text-slate-500">Cases</p><p class="text-2xl font-bold">{{ $cases->count() }}</p></div>
    <div class="bg-white rounded-xl p-4 shadow"><p class="text-sm text-slate-500">Tasks</p><p class="text-2xl font-bold">{{ $tasks->count() }}</p></div>
    <div class="bg-white rounded-xl p-4 shadow"><p class="text-sm text-slate-500">Notifications</p><p class="text-2xl font-bold">{{ $notifications->count() }}</p></div>
</div>
@endsection
