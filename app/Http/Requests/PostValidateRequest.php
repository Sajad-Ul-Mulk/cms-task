<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidateRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'title' => 'required|min:10|max:255',
            'slug' => 'required|max:255|unique:posts',
            'description' => 'required|min:15|max:350',
            'photo' => 'nullable|image',
            'category_id' => 'required|numeric|exists:categories,id',
//            'user_id'=> 'required|numeric|exists:App\Models\User'
            ];
    }
}
