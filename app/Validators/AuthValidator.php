<?php

namespace App\Validators;

use App\Enum\RoleType;
use Illuminate\Support\Facades\Auth;

class AuthValidator {
    static function isAdmin()
    {
        $is = false;
        if(RoleType::Admin == AuthValidator::getRoleType()){
            $is = true;
        }
        return $is;
    }
    static function isUser()
    {
        $is = false;
        if(RoleType::User == AuthValidator::getRoleType()){
            $is= true;
        }
        return $is;
    }
    static function getRoleType()
    {
        $token=json_decode(Auth::token());
        return $token->role_type;
    }

}


