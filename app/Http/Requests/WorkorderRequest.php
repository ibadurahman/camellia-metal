<?php

namespace App\Http\Requests;

use App\Rules\diameterDifferenceRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class WorkorderRequest extends FormRequest
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
        $rule_wo_unique = Rule::unique('workorders','wo_number');
        if($this->method() !== 'POST'){
            $rule_wo_unique->ignore($this->request->get('workorder_id'));
        }

        $supplierDiameter = $this->request->get('bb_diameter');
        $customerDiameter = $this->request->get('fg_size_1');

        return [
            //
            'wo_number'             =>['required',$rule_wo_unique,],
            'bb_supplier'           =>['required'],
            'bb_grade'              =>['required'],
            'bb_diameter'           =>['required','numeric', new diameterDifferenceRule($supplierDiameter,$customerDiameter) ],
            'bb_qty_pcs'            =>['required','numeric'],
            'bb_qty_coil'           =>['required','numeric'],
            'fg_customer'           =>['required'],
            'straightness_standard' =>['required'],
            'fg_size_1'             =>['required','numeric', new diameterDifferenceRule($supplierDiameter,$customerDiameter)],
            'fg_size_2'             =>['required','numeric'],
            'tolerance_minus'       =>['required','numeric'],
            'fg_reduction_rate'     =>['required','numeric'],
            'fg_shape'              =>['required'],
            'fg_qty_kg'             =>['required','numeric'],
            'fg_qty_pcs'            =>['required','numeric'], 
            'machine_id'            =>['required'],
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'Kolom :attribute harus diisi.',
            'numeric'   => 'Isian harus berupa angka.'
        ];
    }
}
