<?php

namespace app\Controllers;

use app\Models\RegisterModel;
use app\system\Request;

class AuthController extends Controller
{
    public function login()
    {
    }

    public function register(Request $request)
    {
        $errors = [];

        $register = new RegisterModel();
        if ($request->isPost()) {
            $register->loadData($request->getBody());

            if ($register->validate() && $register->register()) {
                return "success";
            }

            echo '<pre>';
            var_dump($register->errors);
            die();
            return $this->render('register', ['model' => $register]);
        }
        $this->setLayout("auth");
        return $this->render("register", ['errors' => $errors]);
    }
}
