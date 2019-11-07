<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ValiDemoRequest extends Request
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
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            "required" => "必須項目です",
            "email" => "メールアドレスの形式で入力してください",
            "numeric" => "数値で入力してください"
        ];
    }
}
