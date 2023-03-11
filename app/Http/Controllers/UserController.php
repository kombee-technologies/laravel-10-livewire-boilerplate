<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UsersRequest;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * create
     *
     * @return void
     */
    public function create()
    {

        return view('create-user');
    }


    /**
     * viewUsers
     *
     * @return void
     */
    public function viewUsers()
    {

        return view('livewire.users-list');
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(UsersRequest $request)
    {
        $data = $request->all();
        /* common code for user data insert into database */
        $user = $this->userStore($data);

        /* Insert multiple user galleries */
        UserGalleryController::store($user, $request->gallery);

        /* Insert multiple hobbies */
        HobbyController::store($user,  $request->hobby);

        return new UsersResource($user);
    }



    /**
     * userStore
     *
     * @param  mixed $userData
     * @return void
     */
    public static function userStore($userData)
    {

        $userData['user_type'] = config('constants.user.user_type_enum.1'); // User type id author or sub admin
        $userData['status'] = config('constants.user.status_enum.1');
        $userData = User::create($userData);

        return $userData;
    }
}
