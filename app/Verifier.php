<?php
/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 3/27/16
 * Time: 11:20 AM
 */

namespace App;

use Illuminate\Support\Facades\Auth;

class Verifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }
        else {
            return false;
        }
    }
}