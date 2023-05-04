<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class DateValidator extends AbstractValidator
{
    protected string $message = 'Field :field must be a valid date in format Y-m-d';

    public function rule(): bool
    {
        $date = \DateTime::createFromFormat('Y-m-d', $this->value);
        return $date && $date->format('Y-m-d') === $this->value;
    }
}