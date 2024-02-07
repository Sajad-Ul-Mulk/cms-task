<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
{
    protected $stopOnFirstFailure=true;
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
          'name'=>'required|min:3|max:255',
          'email'=>'required|email|unique:App\Models\User',
          'password'=>'required|min:3|max:255',
          'avatar'=>'nullable|image',
        ];
    }
}
