<?php

namespace App\Http\Requests;

use App\Rules\ComputerAvailable;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class LoansUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'computer_uuid' => [
                'required_without:computer_name',
                'uuid',
                'exists:loans,computer_id',
            ],
            'computer_name' => [
                'required_without:computer_uuid',
                'string',
                'exists:computers,name',
            ],
            'return_status' => [
                'required',
                'string',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'return_status.required' => "Vous devez indiquer l'état de l'ordinateur.",
        ];
    }
}
