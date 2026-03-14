<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function index(): View
    {
        $documents = Document::with(['case', 'user'])->latest()->paginate(15);

        return view('admin.documents.index', compact('documents'));
    }

    public function show(Document $document): View
    {
        return view('admin.documents.show', compact('document'));
    }
}
