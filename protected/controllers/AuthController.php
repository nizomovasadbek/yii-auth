<?php

class AuthController extends Controller {

    private $iden;

    public function actionLogout() {
        if (!Yii::app()->user->isGuest) {
            Yii::app()->user->changeLastActivity();
            Yii::app()->user->logout();
            $this->redirect('/');
        }
        Yii::app()->end();
    }

    public function actionIndex() {
        $this->redirect('/');
        Yii::app()->end();
    }

    public function actionRegister() {
        $model = new RegisterForm();
        $user = new User();
        $duration = 0;

        if (isset($_POST['RegisterForm'])) {
            $model->attributes = $_POST['RegisterForm'];
            if ($model->validate()) {
                $user->username = $model->username;
                $user->password = $model->password;
                $user->email = $model->email;
                $user->create_time = date('Y-m-d H:i:s');
                $user->update_time = date('Y-m-d H:i:s');
                $user->last_activity = date('Y-m-d H:i:s');
                $user->role = 'user';
                if ($model->rememberMe) {
                    $duration = 3600 * 4;
                }
                if ($user->save()) {
                    $this->iden = new UserIdentity($user->username, $user->password);
                    if ($this->iden->authenticate())
                        Yii::app()->user->login($this->iden, $duration);
                    $this->redirect('/');
                    Yii::app()->end();
                }
            }
        }

        $this->render('register', ['model' => $model]);
        Yii::app()->end();
    }

    public function actionLogin() {
        $model = new LoginForm();
        $user = new User();
        $duration = 0;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate()) {
                $this->iden = new UserIdentity($model->username, md5($model->password));
                if ($model->rememberMe)
                    $duration = 3600 * 4;
                if ($this->iden->authenticate()) {
                    Yii::app()->user->login($this->iden, $duration);
                    Yii::app()->user->changeLastActivity();
                }
                $this->redirect('/');
                Yii::app()->end();
            }
        }

        $this->render('login', ['model' => $model]);
        Yii::app()->end();
    }

}
