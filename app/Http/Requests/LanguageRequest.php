<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name'=>'required|string|max:100',
            'direction'=>'required|in:rtl,ltr',
            'active'=>'in:1,0',
            'abbr'=>'required|max:5'
        ];
    }
    public function messages()
    {
        return [
            'required'=> 'يرجى املاء هذا الحقل',
            'in'=>'يرجى التحقق من القيم المدخلة',
            'name.string'=>'اسم اللغة يجب ان يكون حروف',
            'name.max'=>'لقد تجاوزت الحد الاقصى لاسم اللغة يجب ان لا يتعدى 100 حرف',
            'abbr.max'=>'الاختصار يجب ان لا يتعدى 5 احرف'
        ];
    }
}
