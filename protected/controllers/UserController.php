<?php

class UserController extends Controller {

    public function actionIndex() {
        $users = User::model()->findAll();
        $this->render('index', ['users' => $users]);
        Yii::app()->end();
    }

}
