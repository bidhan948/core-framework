<?php

namespace app\Models;

use app\system\Models;

class RegisterModel extends Models
{
    public string $name;
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register()
    {
        echo "creating annew user";
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}
