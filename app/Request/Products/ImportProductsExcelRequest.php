<?php


namespace App\Request\Products;


use App\Request\BaseRequestFormAi;

class ImportProductsExcelRequest extends BaseRequestFormAi
{

    public function rules()
    {
        return [
            'file' => 'required|mimes:csv,xlsx|max:8162',
        ];

    }

    public function authorized()
    {
        return true;
    }
}
