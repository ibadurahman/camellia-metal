<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
        $rule_supplier_unique = Rule::unique('suppliers','name');
        if($this->method() !== 'POST'){
            $supplier_id = Supplier::where('name',$this->request->get('name'))->first();
            $rule_supplier_unique->ignore($supplier_id->id);
        }
        
        return [
            //
            'name'      => ['required',$rule_supplier_unique],
            'grade'     => ['required'],
            'diameter'  => ['required'],
            'qty_kg'    => ['required','numeric'],
            'qty_coil'  => ['required','numeric']
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'Kolom :attribute harus diisi.'
        ];
    }
}
