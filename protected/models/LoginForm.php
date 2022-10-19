<?php

class LoginForm extends CFormModel {

    public $username;
    public $password;
    public $rememberMe;

    public function rules() {
        return array(
            array('username', 'length', 'max' => 45),
            array('password', 'length', 'max' => 256),
            array('rememberMe', 'boolean'),
            array('username, password, rememberMe', 'safe', 'on' => 'search')
        );
    }

}
