@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">My Tasks</h2>
<div class="bg-white rounded-xl shadow p-4">
@foreach($tasks as $task)
<div class="border-b py-3">
<p class="font-medium">{{ $task->title }}</p>
<p class="text-sm text-slate-600">{{ $task->description }}</p>
<p class="text-xs text-slate-500">Due: {{ $task->due_date?->format('Y-m-d') }} · {{ $task->status }}</p>
</div>
@endforeach
</div>
@endsection
