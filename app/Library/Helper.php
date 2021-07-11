<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\MessageBag;

if (!function_exists('mixed')) {
    /**
     * Mix assets with absolute path
     *
     * @param string $path
     * @return string
     */
    function mixed(string $path){
        $versionedFile = mix($path);
        $absolutePath = asset($versionedFile);

        return $absolutePath;
    }
}

if (!function_exists('userNameInitials')) {
    /**
     * Fetch initials from user name
     *
     * @param \App\User $user
     * @return string
     */
    function userNameInitials($user = null){
        if($user == null){
            if(auth()->check()){
                $user = auth()->user();
            }else{
                $user = '';
            }
        }

        if(empty($user)){
            return "NA";
        }

        $nameExploded = explode(' ', $user->name);

        if(isset($nameExploded[1])){
            $nameInitial = substr($nameExploded[0], 0, 1) . substr($nameExploded[1], 0, 1);
        }else{
            $nameInitial = substr($nameExploded[0], 0, 1);
        }

        return strtoupper($nameInitial);
    }
}

if (!function_exists('scoutEnabled')) {
    /**
     * Check scout status
     *
     * @return bool
     */
    function scoutEnabled(){
        return config('scout.status');
    }
}

if (!function_exists('paginationRecords')) {
    /**
     * Fetch default records limit for pagination
     *
     * @return int
     */
    function paginationRecords(){
        return config('app.pagination.records');
    }
}

if (!function_exists('friendlyNumber')) {
    /**
     * Convert numbers to human readable format
     *
     * @param [int] $number
     * @return string
     */
    function friendlyNumber($number){
        $units = ['', 'K', 'M', 'B', 'T'];

        for ($i = 0; $number >= 1000; $i++) {
            $number /= 1000;
        }

        return round($number, 1) . $units[$i];
    }
}

if (!function_exists('cacheExpiry')) {
    /**
     * Get default cache expiry for widgets
     *
     * @param integer $minutes
     * @return void
     */
    function cacheExpiry(int $minutes = 0){
        $seconds = 60;
        $minutes = $minutes != 0 ? $minutes : 5;

        return ($seconds * $minutes);
    }
}

if (!function_exists('stored')) {
    /**
     * Return storage asset with absolute url
     *
     * @param string $path
     * @return string
     */
    function stored(string $path){
        return asset('storage/' . $path);
    }
}

if (!function_exists('apiFailedResponse')) {
    /**
     * Make response for rest errors response in json format
     *
     * @param MessageBag $errors
     * @param array $content
     * @return array
     */
    function apiFailedResponse(MessageBag $errors, array $content = []) : array{
        $response = [
            'status' => false,
            'data' => [],
            'message' => 'Failed',
            'errors' => $errors->messages()
        ];

        if(!empty($content)){
            $response['content'] = $content;
        }

        return $response;
    }
}

if (!function_exists('apiSuccessResponse')) {
    /**
     * Make response for rest success response in json format
     *
     * @param array $content
     * @return array
     */
    function apiSuccessResponse(array $content = []) : array{
        $response = [
            'status' => true,
            'message' => 'Success'
        ];

        if(!empty($content)){
            $response['content'] = $content;
        }

        return $response;
    }
}