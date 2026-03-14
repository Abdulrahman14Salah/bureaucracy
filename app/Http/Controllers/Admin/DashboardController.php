<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseFile;
use App\Models\Document;
use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'casesCount' => CaseFile::count(),
            'documentsCount' => Document::count(),
            'tasksCount' => Task::count(),
            'cases' => CaseFile::latest()->limit(10)->get(),
        ]);
    }
}
