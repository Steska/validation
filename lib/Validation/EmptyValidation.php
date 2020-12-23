<?php

class EmptyValidation implements ValidationInterface
{
    public function validate($value, $options): bool
    {
        if (empty($value)){
            return false;
        }

        return true;
    }

    public function getMessage(): string
    {
        return 'The value not must be empty';
    }
}