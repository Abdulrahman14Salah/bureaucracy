@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>
<div class="grid md:grid-cols-4 gap-4 mb-6">
<div class="bg-white p-4 rounded-xl shadow"><p class="text-sm">Users</p><p class="text-2xl font-bold">{{ $usersCount }}</p></div>
<div class="bg-white p-4 rounded-xl shadow"><p class="text-sm">Cases</p><p class="text-2xl font-bold">{{ $casesCount }}</p></div>
<div class="bg-white p-4 rounded-xl shadow"><p class="text-sm">Documents</p><p class="text-2xl font-bold">{{ $documentsCount }}</p></div>
<div class="bg-white p-4 rounded-xl shadow"><p class="text-sm">Tasks</p><p class="text-2xl font-bold">{{ $tasksCount }}</p></div>
</div>
@endsection
