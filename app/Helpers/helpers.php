<?php
   
use Carbon\Carbon;
use App\Models\User;
use App\Models\SiteSetting;
  
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}
  
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}

if(! function_exists('isAdmin')) {
    function isAdmin(){
        if (Auth::user()->hasRole('Admin')) {
            return true;
        } else {
            return false;
        }
    }
}

if(! function_exists('get_users_centre')) {
    function get_users_centre(){
        $user = Auth::user();
        if(!empty($user->centre)){
            return $user->centre->id;
        }else{
            return NULL;
        }
    }
}

if(! function_exists('get_user_role_by_id')) {
    function get_user_role_by_id($id){
        $user = User::find($id);
        if ($user->hasRole('Admin')) {
            return 'admin';
        } else {
            return 'user';
        }
    }
}

if(! function_exists('get_user_by_id')) {
    function get_user_by_id($id){
        $user = User::find($id);
        return $user;
    }
}


if (!function_exists('getSetting')) {
    function getSetting($key, $default = null)
    {
        return SiteSetting::where('key', $key)->value('value') ?? $default;
    }
}
