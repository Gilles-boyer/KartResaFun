<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlotRequest extends FormRequest
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
            'reservation_formula_id' => 'required|exists:reservation_formulas,id',
            'start_time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:10',
            'status' => 'required|in:waiting,in_progress,finished',
        ];
    }
}
