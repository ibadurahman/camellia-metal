<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class qualityJudgementRule implements Rule
{
    private $quality_judgement;
    private $quality_ng_judgement;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($qualityJudgement,$qualityNgJudgement)
    {
        //
        $this->quality_judgement = $qualityJudgement;
        $this->quality_ng_judgement = $qualityNgJudgement;
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

        if (($this->quality_judgement == 0 && $this->quality_ng_judgement == 'OK')||
        ($this->quality_judgement == 0 && $this->quality_ng_judgement == 'SP/OK')||
        ($this->quality_judgement == 0 && $this->quality_ng_judgement == 'BM/OK')||
        ($this->quality_judgement == 0 && $this->quality_ng_judgement == 'NG/OK')) {
            return false;
        }
        if (($this->quality_judgement == 1 && $this->quality_ng_judgement != 'OK')|| 
        ($this->quality_judgement == 1 && $this->quality_ng_judgement != 'SP/OK')|| 
        ($this->quality_judgement == 1 && $this->quality_ng_judgement != 'BM/OK')||
        ($this->quality_judgement == 1 && $this->quality_ng_judgement != 'NG/OK')) {
            return false;
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Quality Judgement is Unmacthed';
    }
}
