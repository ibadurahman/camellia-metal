<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        $rule_customer_unique = Rule::unique('customers','name');
        if($this->method() !== 'POST'){
            $customer_id = Customer::where('name',$this->request->get('name'))->first();
            $rule_customer_unique->ignore($customer_id->id);
        }
        
        return [
            //
            'name'                  => ['required',$rule_customer_unique],
            'size_1'                => ['required','numeric'],
            'size_2'                => ['required','numeric'],
            'shape'                 => ['required'],
            'straightness_standard' => ['required','numeric']
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'Kolom :attribute harus diisi.'
        ];
    }
}
