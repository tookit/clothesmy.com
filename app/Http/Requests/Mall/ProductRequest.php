<?php

namespace App\Http\Requests\Mall;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required','unique:mall_products,name,'.$this->id],
            'description'=>['string'],
            'is_active' => ['boolean','nullable'],
            'is_home' => ['boolean','nullable'],
            'ali_url' => ['url', 'nullable'],
            'flag' => ['numeric'],
            'specs'=>['string'],
            'packaging'=>['string'],
            'meta_title' => ['string', 'max:255'],
            'meta_keywords' => ['string', 'max:255'],
            'meta_description' => ['string', 'max:255']
        ];
    }
    public function updateRule()
    {
        return [
            'name' => ['unique:mall_products,name,'.$this->id],
            'description'=>['string'],
            'ali_url' => ['url', 'nullable'],
            'specs'=>['string'],
            'flag' => ['numeric'],
            'packaging'=>['string'],
            'meta_title' => ['string', 'max:255'],
            'meta_keywords' => ['string', 'max:255'],
            'meta_description' => ['string', 'max:255']
        ];
    }


}
