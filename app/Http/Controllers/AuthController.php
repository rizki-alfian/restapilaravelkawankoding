<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Transformers\UserTransformer;

class AuthController extends Controller
{
    public function register(Request $request, User $user)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ]);

        $user = $user->create([  //tidak bisa langsung $user->create, harus ditampung di variable terlebih dahulu
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'api_token' => bcrypt($request->email)
        ]);
        
        $response = fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->toArray();

        return response()->json($response, 201);
    }
}
