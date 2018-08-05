<?php
/**
 * Created by PhpStorm.
 * User: ahish
 * Date: 7/17/2018
 * Time: 9:49 AM
 */

namespace App\Alerts;


class AlertByBTA extends Alert {

    protected static $name = 'BTA';

    public static function template($data)
    {
        return static::view('BTA', $data);
    }
}
