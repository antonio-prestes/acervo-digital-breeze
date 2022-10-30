<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CollectionRequest extends FormRequest
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
            'category_id' => ['required'],
            'status_id' => ['required'],
            'title' => ['required'],
            'author' => ['required'],
            'publishing_company' => ['required'],
            'description' => ['required'],
            //TODO alterar as msg de erro padrão
            'img' => [
                File::image()
                    ->min(1)
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(5000)->maxHeight(5000)),
            ],
        ];
    }
}
