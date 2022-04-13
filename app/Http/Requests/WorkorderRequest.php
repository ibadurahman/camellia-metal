<?php

namespace App\Http\Requests;

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

        return [
            //
            'wo_number'         =>['required',$rule_wo_unique],
            'bb_supplier'       =>['required'],
            'bb_grade'          =>['required'],
            'bb_diameter'       =>['required'],
            'bb_qty_pcs'        =>['required'],
            'bb_qty_coil'       =>['required'],
            'fg_customer'       =>['required'],
            'fg_size_1'         =>['required'],
            'fg_size_2'         =>['required'],
            'tolerance_plus'    =>['required'],
            'tolerance_minus'   =>['required'],
            'fg_reduction_rate' =>['required'],
            'fg_shape'          =>['required'],
            'fg_qty'            =>['required'],
            'operator'          =>['required'],
            'machine_id'        =>['required'],
            'production_date'   =>['required'],
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'Kolom :attribute harus diisi.'
        ];
    }
}
