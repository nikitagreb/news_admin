<?php

namespace App\Http\Requests\ParseCategory;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        /** @var \Symfony\Component\HttpFoundation\ParameterBag $request */
        $request = $this->request;
        $connection = 'mysqlConsole.' . env('DB_CONSOLE_DATABASE');
        return [
            'category_id' => [
                'required',
                Rule::unique($connection . '.parse_category')->where(function ($query) use ($request){
                    $query->where('source_id', $request->get('source_id'));
                }),
                Rule::exists($connection . '.category', 'id'),
            ],
            'source_id' => [
                'required',
                Rule::unique($connection . '.parse_category')->where(function ($query) use ($request){
                    $query->where('category_id', $request->get('category_id'));
                }),
                Rule::exists($connection . '.parse_source', 'id'),
            ],
            'link' => "required|unique:$connection.parse_category,link",
            'linkSelector' => "required",
        ];
    }
}
