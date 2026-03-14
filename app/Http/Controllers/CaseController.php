<?php

namespace App\Http\Controllers;

use App\Models\CaseFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CaseController extends Controller
{
    public function index(Request $request): View
    {
        $cases = CaseFile::where('user_id', $request->user()->id)->latest()->paginate(10);

        return view('client.cases.index', compact('cases'));
    }

    public function show(CaseFile $case): View
    {
        return view('client.cases.show', compact('case'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:Pending,In Review,Documents Needed,Approved,Rejected'],
            'assigned_admin' => ['nullable', 'exists:users,id'],
        ]);

        CaseFile::create($validated);

        return redirect()->route('admin.dashboard')->with('status', 'Case created.');
    }

    public function create(): View
    {
        return view('admin.cases.create');
    }

    public function edit(CaseFile $case): View
    {
        return view('admin.cases.edit', compact('case'));
    }

    public function update(Request $request, CaseFile $case): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:Pending,In Review,Documents Needed,Approved,Rejected'],
            'assigned_admin' => ['nullable', 'exists:users,id'],
        ]);

        $case->update($validated);

        return redirect()->route('admin.dashboard')->with('status', 'Case updated.');
    }

    public function destroy(CaseFile $case): RedirectResponse
    {
        $case->delete();

        return redirect()->route('admin.dashboard')->with('status', 'Case deleted.');
    }
}
