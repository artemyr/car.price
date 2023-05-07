<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string',
            'link' => 'string',
            'city_id' => 'integer|nullable',
            'content' => 'string|nullable',
            'tag' => 'string|nullable',
            'preview_text' => 'string|nullable',
            'cr_date' => 'string|nullable',
            'picture_id' => 'integer|nullable',
        ];
    }
}
