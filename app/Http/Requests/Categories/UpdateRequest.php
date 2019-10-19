<?php

namespace App\Http\Requests\Categories;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        /** @var Category $category */
        $category = $this->category;
        $table = 'mysqlConsole.' . env('DB_CONSOLE_DATABASE') . '.category';

        return [
            'name' => "required|unique:$table,name,$category->id",
            'title' => "required|unique:$table,title,$category->id",
            'description' => "required|unique:$table,description,$category->id",
        ];
    }
}
