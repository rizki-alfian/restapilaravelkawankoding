<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Http\Requests;
use App\Transformers\UserTransformer;
use Auth;

class UserController extends Controller
{
    //
    public function users(User $user)
    {
        $users = $user->all();
        return fractal()
            ->collection($users)
            ->transformWith(new UserTransformer)
            ->toArray();
    }

    public function profile(User $user)
    {
        $user = $user->find(Auth::user()->id); //menampilkan user yg hanya mempunya api_token

        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer)
        ->toArray();
    }
}
