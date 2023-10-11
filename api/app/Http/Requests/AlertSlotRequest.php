<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlertSlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'alert_id' => 'required|exists:alerts,id',
            'slot_id' => 'required|exists:slots,id',
        ];
    }
}
