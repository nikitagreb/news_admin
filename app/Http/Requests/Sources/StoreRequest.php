<?php

namespace App\Http\Requests\Sources;

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
        $table = 'mysqlConsole.' . env('DB_CONSOLE_DATABASE') . '.parse_source';
        return [
            'name' => 'required|unique:' . $table,
            'site' => 'required|unique:' . $table,
        ];
    }
}
