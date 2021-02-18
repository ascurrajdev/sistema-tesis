<?php

if(!function_exists("auth_user")){
    function auth_user(){
        return cache()->remember('auth_user',now()->addMinutes(5),function(){
            return auth()->user();
        });
    }
}