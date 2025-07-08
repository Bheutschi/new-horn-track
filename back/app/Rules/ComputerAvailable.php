<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ComputerAvailable implements ValidationRule
{
    public function __construct(private readonly ?string $table, private readonly ?string $column) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! DB::table($this->table ?? $attribute)->where($this->column, $value)->where('available', true)->first()) {
            $fail("L'ordinateur n'est pas disponible.");
        }
    }
}
