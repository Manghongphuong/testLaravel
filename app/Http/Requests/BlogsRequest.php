<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'file_upload' => 'required|mimes:jpeg,png,jpg|max:2048',
            'synopsis' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng không bỏ trống !',
            'title.min' => 'Vui lòng nhập nhiều hơn 3 ký tự !',
            'file_upload.required' => 'Vui lòng chọn ảnh !',
            'file_upload.mimes' => 'Chỉ chọn ảnh JPEG , PNG , JPG',
            'synopsis.required' => 'Vui lòng không bỏ trống !',
            'content.required' => 'Vui lòng không bỏ trống !',
        ];
    }
}
