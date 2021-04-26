<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategorieRequest extends FormRequest
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
           "category"=>'required|array|min:1',
           "category.*.name"=>'required|string|max:100',
           "category.*.active"=>'required|in:0,1' ,
           "category.*.translate_lang"=>'required|string|max:5',
           "photo"=>"required|mimes:jpg,gif,png"
        ];
    }

    public function messages()
    {
        return [
          'required'=>"هذا الحقل مطلوب",
          "photo.mimes"=>"jpg,gif,png صيغة الصورة يجب ان تكون "
        ];
    }
}
