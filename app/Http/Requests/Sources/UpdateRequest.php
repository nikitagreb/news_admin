<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Source;

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
        /** @var Source $source */
        $source = $this->source;
        $table = 'mysqlConsole.' . env('DB_CONSOLE_DATABASE') . '.parse_source';

        return [
            'name' => "required|unique:$table,name,$source->id",
            'site' => "required|unique:$table,site,$source->id",
        ];
    }
}
