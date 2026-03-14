<?php

namespace App\Providers;

use App\Models\CaseFile;
use App\Models\Document;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('view-case', function (User $user, CaseFile $case): bool {
            return $user->hasRole('admin') || $case->user_id === $user->id;
        });

        Gate::define('download-document', function (User $user, Document $document): bool {
            return $user->hasRole('admin') || $document->user_id === $user->id;
        });
    }
}
