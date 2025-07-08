<?php

namespace App\Models;

use Database\Factories\LoanFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    /** @use HasFactory<LoanFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class, 'computer_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function loaner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'loaner_id');
    }

    public function returnLoaner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'return_loaner_id');
    }

    #[Scope]
    protected function active(Builder $query): void
    {
        $query->whereNull('end_at')->orderBy('start_at', 'desc');
    }
}
