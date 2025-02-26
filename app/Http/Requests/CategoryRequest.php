<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:100', Rule::unique('categories','name')->ignore(request('category'),'id')],
        ];
    }

    public function messages()
    {
        return [
            // 'name.unique' => 'The name has already been taken.',
            'name.unique' => __('The name has already been taken.'),
        ];
    }
}
