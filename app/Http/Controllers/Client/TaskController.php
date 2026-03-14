<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CaseFile;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $caseIds = CaseFile::where('user_id', $request->user()->id)->pluck('id');
        $tasks = Task::whereIn('case_id', $caseIds)->latest()->paginate(10);

        return view('client.tasks.index', compact('tasks'));
    }
}
