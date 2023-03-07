<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


/*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the User login, Change Password and logout Functionality.
    |
    */

class LoginController extends Controller
{

    /**
     * Login user and create token
     *
     * @param LoginRequest $request
     * @return LoginResource|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return User::GetError(config('constants.messages.user.invalid'));

        $user = $request->user();

        if ((isset($user) && $user->status != config('constants.user.status_enum.1')))
            return User::GetError(config('constants.messages.login.unverified_account'));
        if ((isset($user) && $user->user_type != config('constants.user.user_type_enum.0')))
            return User::GetError(config('constants.messages.login.unauthorized_access'));

        # Delete the existing tokens from the database and create a new one
        $request->user()->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken; //create a new one tokens

        if ($user != null) {
            $user->authorization = $token;
            return new UsersResource($user);
        } else {
            return User::GetError("No User found.");
        }
    }

    /**
     * Logout User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public static function logout(Request $request)
    {
        $token = $request->user()->tokens()->delete();
        return response()->json('You have been Successfully logged out!');
    }
}
