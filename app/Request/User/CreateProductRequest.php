<?php


namespace App\Request\User;


use App\Request\BaseRequestFormAi;

class CreateProductRequest extends BaseRequestFormAi
{

    public function rules()
    {
        $rules = [
            'description' => 'required|min:3|max:1000',
            'size'        => 'required|numeric|min:30|max:100',
            'color'       => 'required|in:red,green',
            'price'       => 'nullable|numeric|min:1|max:10000'
        ];

        if ($this->request()->segment(3)) {
            $rules['title'] = 'required|min:3|max:60|unique:products,title,' . $this->request()->segment(3) . ',id';
        } else {
            $rules['title'] = 'required|min:3|max:60|unique:products,title';
        }

        return $rules;

    }

    public function authorized()
    {
        return true;
    }
}
