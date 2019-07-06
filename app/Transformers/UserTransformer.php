<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'    => $user->id,
            'name'  => $user->name, //yg disebelah kiri yg di tampilkan di return, sebelah kanan dari tablenya
            'email' => $user->email,
            'registered' => $user->created_at->diffForHumans(),
        ];
    }
}
