<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestPost extends FormRequest
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
        $id = $this->route('id');
        return [
            'title' => ['required', 'string', 'min:6', 'unique:posts,title,' . $id],
            'image' => ['nullable', 'image'],
            'description'   => ['required', 'min: 1'],
            'content'   => 'required|min:1',
            'category_id'   => ['required']
        ];
    }
}
