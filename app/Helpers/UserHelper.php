<?php


namespace App\Helpers;


use App\Models\User;

class UserHelper
{


    public static function getUserStatusSelect()
    {
        return [
          User::STATUS_WAIT => 'неактивный',
          User::STATUS_ACTIVE => 'активный',
        ];
    }

    public static function getStatusLabel($status)
    {
        if ($status === User::STATUS_ACTIVE) {
            return '<span class="badge badge-success">активный</span>';
        } else {
            return '<span class="badge badge-danger">неактивный</span>';
        }
    }
}
