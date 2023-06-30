<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
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

        // return view('create-user');
        return view('create-user', [
            'action' => 'create',
            'data' => [],
        ]);
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

    public function updateUsers($id){
        $userData = User::find($id);


        $hobbies = $userData['hobbies'];
      
        $hobbies_id = [];
        foreach($hobbies as $h){
            $hobbies_id[] = $h->id;
        }
        
        $userData->hobbies_id = $hobbies_id;

        $galleries = $userData['user_galleries'];
        $userData->user_galleries = $galleries;

        $comments = $userData['comments'];
        $comment_text = [];
        $i= 1;
        foreach($comments as $c){
            $comment_text[$i] = $c->comment;
            $i++;
        }
      
        $userData->total_comments = array_keys($comment_text);
        $userData->comments = $comment_text;


        $options = $userData['options'];
        $options_text = [];
        foreach($options as $c){
            $options_text[] = $c->options;
        }
      
        $userData->options = $options_text;


        $chips = $userData['chips'];
        $ochips_text = [];
        foreach($chips as $c){
            $chips_text[] = $c->chips;
        }
      
        $userData->chips = $chips_text;
        
        return view('create-user', [
            'action' => 'update',
            'data' => $userData,
        ]);
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

        /* Insert multiple user Chips */
        ChipController::store($user, $request->chip);

        /* Insert multiple user Options */
        OptionController::store($user, $request->tags);

        /* Insert multiple user comments */
        CommentController::store($user, $request->comment);

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


    public static function userUpdate($userData)
    {

        $userData['user_type'] = config('constants.user.user_type_enum.1'); // User type id author or sub admin
        $userData['status'] = config('constants.user.status_enum.1');
        $userData = User::where('id',$userData['id'])->update($userData);

        return $userData;
    }
}
