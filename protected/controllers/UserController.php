<?php

class UserController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => ['delete'],
                'roles' => ['supervisor']
            ),
                [
                'allow',
                'actions' => ['index', 'edit'],
                'roles' => ['admin']
            ],
                [
                'deny',
                'users' => ['*']
            ]
        );
    }

    public function actionDelete($id) {
        $user = User::model()->findByPk($id);
        if (Yii::app()->user->id == $id) {
            echo 'You can\'t delete yourself';
            Yii::app()->end();
        }

        Yii::app()->user->changeLastActivity();
        $user->delete();
        $this->redirect('/user');
        Yii::app()->end();
    }

    public function actionIndex() {
        $users = User::model()->findAll();
        Yii::app()->user->changeLastActivity();
        $this->render('index', ['users' => $users]);
        Yii::app()->end();
    }

    public function actionEdit($id) {
        Yii::app()->user->changeLastActivity();
        if ($id == Yii::app()->user->id) {
            echo 'You can\'t change your informations from here';
            Yii::app()->end();
        }
        $user = User::model()->findByPk($id);
        $model = new EditUserForm();

        if (isset($_POST['EditUserForm'])) {
            $model->attributes = $_POST['EditUserForm'];
            if ($model->validate()) {
                $user->role = $model->role;
                $user->email = $model->email;
                $user->update_time = date('Y-m-d H:i:s');
                $user->saveAttributes(['role', 'update_time', 'email']);
                $this->redirect('/user');
                Yii::app()->end();
            }
        }

        $this->render('edit', ['model' => $model, 'user' => $user]);
        Yii::app()->end();
    }

}
