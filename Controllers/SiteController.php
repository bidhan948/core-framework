<?php

namespace app\Controllers;

use app\system\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "successfully data  is passed"
        ];

        return $this->render('home',$params);
    }
    public function contact()
    {
       return $this->render('contact');
    }

    public function storeContact(Request $request)
    {
        return "success";
    }
}
