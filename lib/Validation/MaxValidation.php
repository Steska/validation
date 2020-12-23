<?php

class MaxValidation implements ValidationInterface
{
    private $options;

    public function validate($value, $options): bool
    {
        $this->options = $options;
        if (empty($options['max'])){
            throw new MaxValidationException('The max value must be entered');
        }

        if (is_numeric($value)){
            if ($value >= $options['min']){
                return false;
            }
            return true;
        }

        if (is_string($value)){
            if (strlen($value) >= $options['min']){
                return false;
            }
            return true;
        }

        return true;
    }

    public function getMessage(): string
    {
        return 'The value must be more then '.$this->options['min'];
    }
}