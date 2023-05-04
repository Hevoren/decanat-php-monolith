<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class PasswordValidator extends AbstractValidator
{
    protected string $message = 'Field :field must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number';

    public function rule(): bool
    {
        $uppercase = preg_match('/[A-Z]/', $this->value);
        $lowercase = preg_match('/[a-z]/', $this->value);
        $number = preg_match('/[0-9]/', $this->value);
        $length = strlen($this->value) >= 8;

        return $uppercase && $lowercase && $number && $length;
    }
}