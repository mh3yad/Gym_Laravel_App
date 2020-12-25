<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class membersRequest extends FormRequest
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
            'name'=>'unique:members|required',
            'phone_num'=>'required|unique:members',
            'day'=>'integer|between:1,30',
            'month'=>'integer|between:1,12'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'يجب ادخال اسم المستخدم',
            'name.unique' => 'هذا الاسم موجود بالفعل',
            'phone_num.required' => 'يجب ادخال رقم الهاتفا',
            'phone_num.unique' => 'هذا الرقم موجود بالفعل',
            'day.between:1,30' => 'يجب ان يكون اليوم بين قيميتي 1 و 30 ',
            'month.between:1,12' => 'يجب ان يكون الشهر  بين قيميتي 1 و 12 '


        ];
    }
}
