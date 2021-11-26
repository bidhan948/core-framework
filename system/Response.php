<?php

namespace app\system;

class Response
{
    public function setStatusCode($code)
    {
       return http_response_code($code);
    }
}