@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">My Cases</h2>
<div class="bg-white rounded-xl shadow overflow-x-auto">
<table class="w-full text-sm">
<thead class="bg-slate-50"><tr><th class="p-3 text-left">Title</th><th class="p-3 text-left">Status</th><th class="p-3">Updated</th></tr></thead>
<tbody>
@foreach($cases as $case)
<tr class="border-t"><td class="p-3"><a class="text-cyan-700" href="{{ route('cases.show',$case) }}">{{ $case->title }}</a></td><td class="p-3">{{ $case->status }}</td><td class="p-3">{{ $case->updated_at?->diffForHumans() }}</td></tr>
@endforeach
</tbody>
</table>
</div>
@endsection
