<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Transaction;

class UpdateOrderRequest extends FormRequest
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
        $rules = Transaction::$rules;
        $rules['grand_total'] = '';
        $rules['transaction_number'] = '';
        $rules['shop_id'] = '';
        $rules['customer_id'] = '';
        $rules['status_id'] = '';
        $rules['package_id'] = '';
        $rules['payment_img'] = 'required';

        return $rules;
    }
}
