<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            //
            'title' => 'required|min:3|unique:posts,title,'.$this->Post,
            // dd($this->Post),
            'description' => 'required|min:10',
            'user_id'=>'exists:posts'
        ];
    }

    public function messages()
    {
        return [
            //
            'title.required' => 'The title field is required.',
            'description.required' => 'The description field is required.',
            'title.min' => 'The title can not be less than 3 characters.',
            'description.min' => 'The description can not be less than 10 characters.',
            'user_id.exists' =>'user does not exist',
            
        ];
    }
}
