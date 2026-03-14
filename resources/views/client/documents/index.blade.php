@extends('layouts.app')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Upload Documents</h2>
<div class="grid lg:grid-cols-2 gap-4">
<form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow p-4 space-y-3">
@csrf
<select name="case_id" class="w-full border rounded p-2">@foreach($cases as $case)<option value="{{ $case->id }}">{{ $case->title }}</option>@endforeach</select>
<input type="file" name="document" class="w-full border rounded p-2" required>
<button class="px-4 py-2 bg-cyan-600 text-white rounded">Upload</button>
</form>
<div class="bg-white rounded-xl shadow p-4">
<h3 class="font-semibold mb-3">My Uploads</h3>
<ul class="space-y-2 text-sm">@foreach($documents as $document)<li><a class="text-cyan-700" href="{{ route('documents.download',$document) }}">{{ $document->filename }}</a> - {{ $document->status }}</li>@endforeach</ul>
</div>
</div>
@endsection
