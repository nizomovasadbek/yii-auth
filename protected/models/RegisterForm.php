<?php

class RegisterForm extends CFormModel {
    
    public $username;
    public $password;
    public $email;
    public $rememberMe;
    
    public function rules(){
        return array(
            array('username', 'length', 'max' => 45),
            array('password', 'length', 'max' => 256),
            array('email', 'length', 'max' => 90),
            array('rememberMe', 'boolean'),
            array('email', 'email'),
            array('username, password, email, rememberMe', 'safe', 'on'=>'search')
        );
    }
    
}