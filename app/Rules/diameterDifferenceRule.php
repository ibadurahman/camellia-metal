<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class diameterDifferenceRule implements Rule
{
    private $supplier_diameter;
    private $customer_diameter;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($supplier, $customer)
    {
        //
        // dd([$supplier,$customer]);
        $this->supplier_diameter = $supplier;
        $this->customer_diameter = $customer;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $diff = $this->supplier_diameter - $this->customer_diameter;
        
        return abs($diff) <= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Diameter Difference Cannot More Than 3 mm';
    }
}
