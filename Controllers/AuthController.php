<?php

namespace app\Controllers;

use app\system\Request;

class AuthController extends Controller
{
    public function login()
    {
        
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            return "success";
        }
        $this->setLayout("auth");
        return $this->render("register");
    }
}
