@extends('layouts.app')
@section('content')
<div class="bg-white rounded-xl shadow p-6">
<h2 class="text-2xl font-semibold mb-2">{{ $case->title }}</h2>
<p class="text-slate-600 mb-4">{{ $case->description }}</p>
<span class="inline-flex px-3 py-1 rounded-full text-sm bg-cyan-100 text-cyan-700">{{ $case->status }}</span>
</div>
@endsection
