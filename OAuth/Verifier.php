<?php
/**
 * Created by PhpStorm.
 * User: clecio
 * Date: 05/08/2015
 * Time: 22:20
 */

namespace CodeProject\OAuth;


use Illuminate\Support\Facades\Auth;

class Verifier
{
    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function verify($username, $password)
    {
        $credentials = [
            'email' => $username,
            'password' => $password
        ];

        if(Auth::once($credentials))
        {
            return Auth::user()->id;
        }
        return false;
    }
}