<?php

namespace App\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => ['bail','nullable','numeric'],
            'name' => ['required', 'max:255', 'unique:posts,name,'.$this->id],
            'description' => ['required'],
            'content' =>[],
            'is_active' => ['boolean'],
            'img' => ['string','nullable','url'],
            'meta_title' => ['string', 'max:255'],
            'meta_keywords' => ['string', 'max:255'],
            'meta_description' => ['string', 'max:255']
        ];
    }
    public function updateRule()
    {
        return [
            'category_id' => 'sometimes',
            'name' => 'unique:posts,name,'.$this->id,
            'description' => ['sometimes'],
            'content' =>[],
            'is_active' => ['boolean'],
            'img' => ['string','nullable','url'],
            'meta_title' => ['string', 'max:255'],
            'meta_keywords' => ['string', 'max:255'],
            'meta_description' => ['string', 'max:255']
        ];
    }



}
