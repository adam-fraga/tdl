<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $user = new UserModel();

        $this->render('user/index');
    }

    public function profil()
    {

    }
}