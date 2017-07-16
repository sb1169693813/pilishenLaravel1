<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateTaskRequest extends Request
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
            'title'=>'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'任务标题是必填的',
            'title.max'=>'任务标题不能超过255个字符',
        ];
    }
}
