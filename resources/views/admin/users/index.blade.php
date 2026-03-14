@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Users</h2>
<div class="bg-white rounded-xl shadow p-4">
@foreach($users as $user)
<div class="border-b py-2">{{ $user->name }} · {{ $user->email }} · <span class="uppercase text-xs">{{ $user->role }}</span></div>
@endforeach
</div>
@endsection
