<?php

class NumericValidation implements ValidationInterface
{
    public function validate($value, $options): bool
    {
        if (!is_numeric($value)){
            return false;
        }
        return true;
    }

    public function getMessage(): string
    {
        return 'The value must be is numeric';
    }
}