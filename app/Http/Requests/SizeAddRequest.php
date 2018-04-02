<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SizeAddRequest extends Request
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
            'txtSizeName'    => 'required|unique:size,size_ten'
        ];
    }

    public function messages() {
        return [
            'txtSizeName.required'   => '<div><strong  style="color: red;">Vui lòng không để trống trường này!</strong></div>',
            'txtSizeName.unique'     => '<div><strong  style="color: red;">Dữ liệu này đã tồn tại!</strong></div>'
        ];
    }
}
