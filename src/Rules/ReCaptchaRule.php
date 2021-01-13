<?php

namespace Redbastie\Larawire\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class ReCaptchaRule implements Rule
{
    public function passes($attribute, $value)
    {
        $recaptcha = new ReCaptcha(config('services.recaptcha.secret_key'));
        $resp = $recaptcha->verify($value, request()->ip());

        return $resp->isSuccess();
    }

    public function message()
    {
        return trans('The recaptcha response is invalid.');
    }
}
