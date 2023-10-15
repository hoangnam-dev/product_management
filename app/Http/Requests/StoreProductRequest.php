<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_code' => 'required|min:4|max:4|alpha_num',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_unit' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'product_code.required' => 'Mã số sản phẩm không được trống',
            'product_code.min' => 'Mã số sản phẩm phải là 4 ký tự',
            'product_code.max' => 'Mã số sản phẩm phải là 4 ký tự',
            'product_code.alpha_num' => 'Mã số sản phẩm không chứa ký tự đặc biệt',
            'product_name.required' => 'Tên sản phẩm không được trống',
            'product_price.required' => 'Giá sản phẩm không được trống',
            'product_unit.required' => 'Đơn vị tính không được trống',
        ];
    }
}
