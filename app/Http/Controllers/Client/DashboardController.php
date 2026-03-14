<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CaseFile;
use App\Models\PortalNotification;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        $cases = CaseFile::where('user_id', $user->id)->latest()->get();
        $tasks = Task::whereIn('case_id', $cases->pluck('id'))->latest()->get();
        $notifications = PortalNotification::where('user_id', $user->id)->latest()->limit(5)->get();

        return view('client.dashboard', compact('cases', 'tasks', 'notifications'));
    }
}
