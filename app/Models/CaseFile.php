<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaseFile extends Model
{
    use HasFactory;

    protected $table = 'cases';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'assigned_admin',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_admin');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'case_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'case_id');
    }
}
