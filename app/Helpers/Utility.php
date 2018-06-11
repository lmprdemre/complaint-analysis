<?php
namespace App\Helpers;
use App\Models\Comment;
use App\Models\Menu;
use App\Models\MenuHasFeatures;
use App\Models\MenuHasPage;
use App\Models\Stats;
use App\Models\Tags;
use App\Models\User;
use App\Models\Video;
use Illuminate\Contracts\Validation\Validator;

class Utility
{
    public static function formatErrors(Validator $validator)
    {
        return response()->json(['error' => ['message' => $validator->errors()->first(), 'status' => 400]],400);
    }

    public static function formatErrorsArray(Validator $validator)
    {
        return ['error' => ['message' => $validator->errors()->first(), 'status' => 400]];
    }

    public static function validatorMessages(){
        $messages = [
            'required' => ':Attribute alanı zorunludur.',
            'unique' => 'Girilen :attribute değeri daha önceden alınmış.',
            'min' => 'Girilen :attribute değeri en az :min karakterli olmalıdır.',
            'max' => 'Girilen :attribute değeri en fazla :max karakterli olmalıdır.',
            'numeric' => 'Girilen :attribute değeri rakam olmalıdır.',
            'exists' => 'Girilen :attribute bulunmamaktadır.'
        ];
        return $messages;
    }
    public static function getTrDay($day){
        $dayTr = [
            'monday' => 'pazartesi',
            'tuesday' => 'salı',
            'wednesday' => 'çarşamba',
            'thursday' => 'perşembe',
            'friday' => 'cuma',
            'sturday' => 'cumartesi',
            'sunday' => 'pazar'
        ];
        return $dayTr[strtolower($day)];
    }

    public static function sefLink($sef) {
        $tr  = array('ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','ş','Ş',' ');
        $eng = array('i','i','g','g','u','u','o','o','c','c','s','s','-');
        $sef = str_replace($tr,$eng,$sef);
        $sef = mb_strtolower($sef);
        $sef = preg_replace('/&.+?;/','', $sef);
        $sef = preg_replace('/[^%a-z0-9_-]/', '', $sef);
        $sef = str_replace("\\","",$sef);
        $sef = str_replace('"',"",$sef);
        $sef = preg_replace("/'/","",$sef);
        $sef = preg_replace("/ +/"," ",$sef);
        $sef = preg_replace("/\s/","",$sef);
        $sef = preg_replace('/-+/', '-', $sef);
        $sef = preg_replace('|-+|', '-', $sef);
        $sef = trim($sef, '-');
        return $sef;
    }
}