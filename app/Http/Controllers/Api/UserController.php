<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return new UserResource(200, true, 'Data Users', $users);
    }
}
