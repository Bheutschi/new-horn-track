<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class LoansCheckRequest extends FormRequest
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
        if ($this->has('computer_uuid')) {
            $this->merge([
                'computer_uuid' => Uuid::fromString($this->computer_uuid)->toString() ?? '',
            ]);
        } else {
            $this->merge([
                'computer_name' => $this->computer_name,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'computer_uuid' => [
                'bail',
                'required_without:computer_name',
                'uuid',
                'exists:computers,id,available,1',
            ],
            'computer_name' => [
                'bail',
                'required_without:computer_uuid',
                'string',
                'exists:computers,name,available,1',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'computer_uuid.exists' => "L'ordinateur n'existe pas ou n'est pas disponible.",
            'computer_name.exists' => "L'ordinateur n'existe pas ou n'est pas disponible.",
        ];
    }
}
