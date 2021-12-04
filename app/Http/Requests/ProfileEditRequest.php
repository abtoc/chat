<?php

namespace App\Http\Requests;

use App\Rules\AdultRule;
use App\Rules\PerfRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date', new AdultRule],
            'perf' => ['required', 'string', new PerfRule],
            'comment' => ['nullable', 'string', 'max:1000']
        ];
    }
}
