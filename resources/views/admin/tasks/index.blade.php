@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Tasks</h2>
<div class="bg-white rounded-xl shadow p-4">@foreach($tasks as $task)<div class="border-b py-2">{{ $task->title }} · {{ $task->status }}</div>@endforeach</div>
@endsection
