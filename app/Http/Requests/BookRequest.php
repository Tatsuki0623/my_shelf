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
            'book.impression' => 'nullable|string|max:600',
            'book.point' => 'integer|between:0,100',
            'book.volume' => 'integer|min:1',
        ];
    }
}
