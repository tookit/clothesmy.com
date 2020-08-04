<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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

    public function setScenario($scenario) {

        $this->scenario = $scenario;
    }

    public function createRule()
    {
        return [
            'name' =>  'required',
            'img' => 'url',
            'is_active'=> 'boolean',
        ];
    }
    public function updateRule()
    {
        return [
            'name' =>  'required',
            'img' => 'url',
            'is_active'=> 'boolean',
        ];
    }

}
