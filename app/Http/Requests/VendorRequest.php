<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            "full_name"=>'required|string|max:100',
            "email"=>"required|email|unique:vendors,email,".$this->id,
            "password"=>"required",
            "mobile"=>"required|unique:vendors,mobile,".$this->id,
            "adress"=>"required|string",
            "active"=>"in:1,0",
            "photo"=>"required_without:id|mimes:jpg,gif,png",
            "main_categorie_id"=>"required|exists:main_categories,id"
        ];
    }
}
