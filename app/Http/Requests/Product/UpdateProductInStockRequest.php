<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductInStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'size' => ['required', 'numeric'],
            'type' => ['required', 'string', 'max:255'],
            'color' => ['required', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            'gender' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'between:1,99999999999999'],
            'quantity' => ['required', 'numeric', 'between:1,99999999999999'],
        ];
    }
}