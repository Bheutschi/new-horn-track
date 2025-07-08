<?php

namespace App\Models;

use Database\Factories\ComputerFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Computer extends Model
{
    /** @use HasFactory<ComputerFactory> */
    use HasFactory;

    use HasUuids;

    protected $guarded = [];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'computer_id');
    }

    #[Scope]
    protected function available(Builder $query): Builder
    {
        return $query->where('available', true);
    }

    public function lastLoan(): HasOne
    {
        return $this->hasOne(Loan::class)
            ->latestOfMany('end_at');
    }
}
