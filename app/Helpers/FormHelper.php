<?php


namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class FormHelper
{
    public static function dropDownList(Collection $collection, string $key, string $value)
    {
        $result = [];
        foreach ($collection as $item) {
            $result[$item->$key] = $item->$value;
        }

        return $result;
    }
}
