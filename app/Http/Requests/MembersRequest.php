<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembersRequest extends FormRequest
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
            'name' => ['required'],
            'phone_number' => ['required'],
            'motto' => ['required|min:10'],
            'address' => ['required'],  
        ];
    }

    public function message()
    {
        return [
            'required' => ':attribute은(는) 필수 입력 항목입니다.',
            'min' => ':attribute은(는) 최소 :min글자 이상이 필요합니다.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '이름',
            'phone_number' => '전화번호',
            'motto' => '모토',
            'address' => '주소',
        ];
    }
}
