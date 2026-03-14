<?php

namespace Database\Seeders;

use App\Models\CaseFile;
use App\Models\Document;
use App\Models\PortalNotification;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => Hash::make('password'), 'role' => 'admin']
        );
        $admin->assignRole('admin');

        $client = User::firstOrCreate(
            ['email' => 'client@example.com'],
            ['name' => 'Client User', 'password' => Hash::make('password'), 'role' => 'client']
        );
        $client->assignRole('client');

        $case = CaseFile::firstOrCreate(
            ['title' => 'Sample Immigration Case'],
            [
                'user_id' => $client->id,
                'description' => 'Initial filing and document review.',
                'status' => 'In Review',
                'assigned_admin' => $admin->id,
            ]
        );

        Task::firstOrCreate(
            ['title' => 'Upload passport copy'],
            [
                'case_id' => $case->id,
                'description' => 'Please upload a clear passport scan.',
                'status' => 'Pending',
                'due_date' => now()->addDays(7),
            ]
        );

        Document::firstOrCreate(
            ['filename' => 'welcome-checklist.pdf'],
            [
                'case_id' => $case->id,
                'user_id' => $client->id,
                'path' => 'documents/welcome-checklist.pdf',
                'status' => 'Uploaded',
            ]
        );

        PortalNotification::firstOrCreate(
            ['message' => 'Your case status has been updated to In Review.'],
            ['user_id' => $client->id]
        );
    }
}
