<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestPost extends FormRequest
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
            'title' => ['required', 'string', 'min:6', 'unique:posts,title'],
            'image' => ['required', 'image'],
            'description'   => ['required', 'min: 1'],
            'content'   => 'required|min:1',
            'category_id'   => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề là trường bắt buộc',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'title.string' => 'Tiêu đề phải là chuỗi',
            'title.min' => 'Tiêu đề phải có ít nhất 6 ký tự',
            'image.required' => 'Ảnh là trường bắt buộc',
            'image.image' => 'Ảnh phải là file ảnh',
            'description.required' => 'Mô tả là trường bắt buộc',
            'description.min' => 'Mô tả phải có ít nhất 1 ký tự',
            'content.required' => 'Nội dung là trường bắt buộc',
            'content.min' => 'Nội dung phải có ít nhất 1 ký tự',
            'category_id.required' => 'Danh mục là trường bắt buộc',
        ];
    }
}
