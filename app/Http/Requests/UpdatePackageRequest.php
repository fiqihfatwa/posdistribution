<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Package;

use Illuminate\Support\Facades\Auth;

class UpdatePackageRequest extends FormRequest
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
        $rules = Package::$rules;
        if(Auth::user()->role_id != 1) {
            $rules['user_id'] = '';
        }
        
        return $rules;
    }
}
