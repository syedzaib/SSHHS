<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    $userId = $this->user()->id;

    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $userId],
        'id_number' => ['required', 'string', 'max:50'],
        'date_of_birth' => ['required', 'date'],
        'mobile_number' => ['required', 'string', 'max:20'],
        'nationality' => ['required', 'string', 'max:50'],
        'gender' => ['required', 'in:male,female'],
        'qualification' => ['nullable', 'string', 'max:100'],
        'specialization' => ['nullable', 'string', 'max:100'],
    ];
}

}
