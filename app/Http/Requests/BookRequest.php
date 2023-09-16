<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'book.title' => 'required|string|max:100',
            'book.impression' => 'nullable|string|max:140',
            'book.point' => 'nullale|integer|between:0,100',
            'book.volume' => 'nullable|integer|min:1',
        ];
    }
    
    public function message()
    {
        return [
            'book.impression.max' => '140文字以内で入力してください',
            'book.point.between' => '0~100の間で入力してください',
            'book.volume.min' => '1以上の数値を入力してください',
        ];
    }
}
