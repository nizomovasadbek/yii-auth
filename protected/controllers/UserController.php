<?php

class UserController extends Controller {

    public function actionIndex() {
        $users = User::model()->findAll();
        echo '<pre>';
        print_r($users);
        echo '</pre>';
        Yii::app()->end();
    }

}
