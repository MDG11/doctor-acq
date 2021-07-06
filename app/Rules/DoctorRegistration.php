<?php

namespace App\Rules;

use App\Models\DoctorCode;
use Illuminate\Contracts\Validation\Rule;

class DoctorRegistration implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $code = DoctorCode::where('code', '=', $value)->first();
        return ($code && $code->user_id == null);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The doctor code is used by other doctor, contact us if you think this is mistake!.';
    }
}
