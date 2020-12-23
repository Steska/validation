<?php

class LoginForm extends AbstractForm
{
    public function getOptions(): array
    {
        return [
            'password' => ['min,min=8;string=1'],
            'login' => ['empty', 'min,min=3'],
        ];
    }
}