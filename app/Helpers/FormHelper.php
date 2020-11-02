<?php


namespace App\Helpers;


use App\Models\User;

class FormHelper
{

    public static function getLabelYesOrNo($value)
    {
        if ($value) {
            return '<span class="badge badge-success">да</span>';
        } else {
            return '<span class="badge badge-danger">нет</span>';
        }
    }

    public static function getLabelActive($value)
    {
        if ($value) {
            return '<span class="badge badge-success">активный</span>';
        } else {
            return '<span class="badge badge-danger">не активный</span>';
        }
    }

}
