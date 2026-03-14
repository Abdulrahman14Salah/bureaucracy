@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Documents</h2>
<div class="bg-white rounded-xl shadow p-4">@foreach($documents as $document)<div class="border-b py-2">{{ $document->filename }} · {{ $document->case?->title }}</div>@endforeach</div>
@endsection
