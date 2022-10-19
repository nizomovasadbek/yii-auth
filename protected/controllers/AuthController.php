<?php

class AuthController extends Controller {

    private $iden;

    public function actionIndex() {
        $this->redirect('/');
        Yii::app()->end();
    }

    public function actionRegister() {
        $model = new RegisterForm();
        $user = new User();

        $this->render('register', ['model' => $model]);
        Yii::app()->end();
    }

}
