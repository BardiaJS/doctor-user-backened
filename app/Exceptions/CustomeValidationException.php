<?php

namespace App\Exceptions;

use Exception;

class CustomeValidationException extends Exception
{
    protected $errors;

    public function __construct($message = "Validation Error", $errors = [])
    {
        parent::__construct($message);
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
