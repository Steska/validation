<?php
include 'autoload.php';

$form = new LoginForm(
    [
        'login' => 'te',
        'password' => '1234567'
    ]
);

if (!empty($form->getErrors())){
    print_r($form->getErrors());
}else{
    echo 'Validation success';
}