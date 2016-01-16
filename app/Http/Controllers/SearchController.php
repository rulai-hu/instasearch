<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Validator;


class SearchController extends BaseController
{
    public function __construct()
    {
        Validator::extend('NoDigits', function($attribute, $value, $parameters, $validator) {
            return 1 !== preg_match('/^[\d]+$/', $value);
        });

        Validator::extend('ValidHashTag', function($attribute, $value, $parameters, $validator) {
            $foundSpecChars = (1 === preg_match('/[^\w\d_]+|\s+/', $value));
            $foundStartingDigits = (1 === preg_match('/^[\d]+/', $value));
            return ! $foundSpecChars && ! $foundStartingDigits;
        });
    }

    public function search($param = null)
    {
        $validator = Validator::make(["input" => $param], ["input" => "NoDigits|ValidHashTag"]);
        // dd(preg_match('/^[\d]+/', $param));
        if ($validator->fails()) {
            dd("failed!");
        } else {
            dd("success!");
        }

        if (empty($param) || ! $this->inputIsValid($param)) {
            return response('', 500);
        }

        $result = $this->instagramSearch($param);

        return response()->json([$result]);
    }

    private function inputIsValid($input)
    {
        return 1 !== preg_match('/[^\w\d_]+|\s+/', $input);
    }

    private function instagramSearch($param)
    {
        $curlHandler = curl_init();
        $queryString = "?access_token=" . env('INSTAGRAM_SECRET');
        curl_setopt($curlHandler, CURLOPT_URL, "https://api.instagram.com/v1/tags/{$param}/media/recent" . $queryString); 

        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_TIMEOUT, '30');
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);

        $content = trim(curl_exec($curlHandler));
        curl_close($curlHandler);

        return json_decode($content, true);
    }
}