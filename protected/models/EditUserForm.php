<?php

class EditUserForm extends CFormModel {
    
    public $email;
    public $role;
    
    public function rules(){
        return array(
            array('email', 'email'),
            array('role', 'length', 'max' => 15),
            array('role, email', 'safe', 'on' => 'search')
        );
    }
    
}