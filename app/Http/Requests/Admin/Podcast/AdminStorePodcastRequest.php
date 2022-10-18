<?php

namespace App\Http\Requests\Admin\Podcast;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminStorePodcastRequest extends FormRequest
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
            'title' => 'required|string|unique:podcasts,title',
            'author' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'status' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5000',
            'audio' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav|max:30000',
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'This title already exists!',
            'category_id.required' => 'Select category!',
        ];
    }

    protected function failedValidation(Validator $validator){

        // return errors in json object/array
        $message = $validator->errors()->all();
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $message
        ]));
    }
}
