<?php

namespace App\Http\Requests\Mall;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
        return !$this->id ? $this->createRule() : $this->updateRule();
    }
    public function createRule()
    {
        return [
            'name' => ['required', 'max:255', 'unique:properties,name,'.$this->id],
            'type' => ['string','nullable'],
            'unit' => ['string','nullable'],

        ];
    }
    public function updateRule()
    {
        return [
            'name' => ['max:255', 'unique:properties,name,'.$this->id],
            'type' => ['string','nullable'],
            'unit' => ['string','nullable'],
        ];
    }

}
