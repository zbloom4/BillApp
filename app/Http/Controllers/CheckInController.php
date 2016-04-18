<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\User;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Authorizer;
use LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware;
use LucaDegasperi\OAuth2Server\Middleware\OAuthUserOwnerMiddleware;


class CheckInController extends Controller
{
    public function __construct()
    {
        $this->middleware(OAuthMiddleware::class);
        $this->middleware(OAuthUserOwnerMiddleware::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $authorizer
     * @return CheckIn
     */
    public function index(Authorizer $authorizer) {
        $user_id = $authorizer->getResourceOwnerId(); // the token user_id
        $checkIns = CheckIn::where('user_id','=', $user_id )->get();
        return $checkIns;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return CheckIn
     */
    public function store(Authorizer $authorizer) {
        $user_id = $authorizer->getResourceOwnerId(); // the token user_id
        $checkIn = new CheckIn();
        $checkIn->user_id = $user_id;
        $checkIn->painLevel = $_POST['painLevel'];
        $checkIn->save();
        return $checkIn;
    }
}
