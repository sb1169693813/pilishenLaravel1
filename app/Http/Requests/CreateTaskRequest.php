<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTaskRequest extends Request
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
          'createtitle' => 'required|max:255'
      ];
    }

    public function messages()
    {
      return [
        'createtitle.required' => '任务名称是必填的',
        'createtitle.max' => '任务名称不能超过255个字段'
      ];
    }
}
