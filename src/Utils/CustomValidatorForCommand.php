<?php

namespace App\Utils;

use Symfony\Component\Console\Exception\InvalidArgumentException;

class CustomValidatorForCommand
{
    /**
     * Validate the username enter via the CLI (app:make:administrator)
     *
     * @param string|null $usernameEntered
     * @return string
     */
    public function validateUsername(?string $usernameEntered): string
    {
        if (empty($usernameEntered))
        {
            throw new InvalidArgumentException('Please enter an username');
        }

        return $usernameEntered;
    }


    /**
     * Validate a password enter via CLI (app:make:administrator)
     *
     * @param string|null $plainPassword
     * @return string
     */
    public function validatePassword(?string $plainPassword): string
    {
        if (empty($plainPassword))
        {
            throw new InvalidArgumentException('Please enter a password');
        }

        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#_$@!%&*?.,-])[A-Za-z\d#_$@!%&*?.,-]{8,}$/';

        if (!preg_match($passwordRegex, $plainPassword))
        {
            throw new InvalidArgumentException('This password must contain min 8 char, min one digit, min one lowercase, min one uppercase and one special char(#_$@!%&*?.,-)');
        }
        return $plainPassword;
    }
}