<?php


namespace App\Helper;

use Aiken\i18next\i18next;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function get_active_language()
    {
        $lang = 'en';

        if (request()->has('language')) {
            $lang = request()->get('language', 'en');
        } else if (!request()->is('api/*') && Auth::user()) {
            $lang = Auth::user()->language;
        }

        return $lang;
    }

    public static function init_model_translation($lang, $path) {
        try {
            return new i18Next($lang, $path);
        } catch (\Exception $e) {
//            dd('i18next exception init model translation', $e, $lang, $path);
        }
    }

    public static function str_to_psr4($str) : string
    {
        $psr4 = str_replace('-', '', ucwords($str, '-'));

        if (!$str) {
            $psr4 = lcfirst($psr4);
        }

        return $psr4;
    }
}
