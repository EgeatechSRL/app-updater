<?php

namespace EgeaTech\AppUpdater\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use EgeaTech\AppUpdater\Contracts\Http\Requests\ApplicationShowRequestContract;

class ApplicationShowRequest extends FormRequest implements ApplicationShowRequestContract
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
        return [];
    }
}
