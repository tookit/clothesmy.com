<?php

namespace App\Http\Requests\Taggable;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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



    public function rules()
    {
        return !$this->id ? $this->createRule() : $this->updateRule();
    }

    public function createRule()
    {
        return [
            'name' =>['required'],
            'description' => ['string'],
            'type' => ['string']
        ];
    }
    public function updateRule()
    {
        return [
            'name' =>['string'],
            'description' => ['string'],
            'type' => ['string']
        ];
    }


}
