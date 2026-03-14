<?php

namespace App\Http\Controllers;

use App\Models\CaseFile;
use App\Models\Document;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    public function index(Request $request): View
    {
        $documents = Document::where('user_id', $request->user()->id)->latest()->paginate(10);
        $cases = CaseFile::where('user_id', $request->user()->id)->get();

        return view('client.documents.index', compact('documents', 'cases'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'case_id' => ['required', 'exists:cases,id'],
            'document' => ['required', 'file', 'max:10240'],
        ]);

        $path = $request->file('document')->store('documents');

        Document::create([
            'case_id' => $validated['case_id'],
            'user_id' => $request->user()->id,
            'filename' => $request->file('document')->getClientOriginalName(),
            'path' => $path,
            'status' => 'Uploaded',
        ]);

        return redirect()->route('documents.index')->with('status', 'Document uploaded.');
    }

    public function download(Request $request, Document $document): StreamedResponse
    {
        abort_unless($request->user()->hasRole('admin') || $document->user_id === $request->user()->id, 403);

        return Storage::download($document->path, $document->filename);
    }
}
