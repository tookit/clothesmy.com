<?php

namespace App\Http\Requests\Mall;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'parent_id' => ['bail','nullable','numeric'],
            'name' => ['required', 'max:255', 'unique:mall_categories,name,'.$this->id],
            'description' => ['required'],
            'featured_img' => ['url','nullable'],
            'flag' => ['string'],
            'is_active' => ['boolean','nullable'],
            'is_home' => ['boolean','nullable'],
            'meta_title' => ['string', 'max:255'],
            'meta_keywords' => ['string', 'max:255'],
            'meta_description' => ['string', 'max:255']
        ];
    }
    public function updateRule()
    {
        return [
            'parent_id' => ['sometimes'],
            'name' => ['unique:mall_categories,name,'.$this->id],
            'description' => ['sometimes'],
            'is_active' => ['boolean','nullable'],
            'is_home' => ['boolean','nullable'],
            'flag' => ['string'],
            'featured_img' => ['url','nullable'],
            'meta_title' => ['string', 'max:255'],
            'meta_keywords' => ['string', 'max:255'],
            'meta_description' => ['string', 'max:255']
        ];
    }

}
