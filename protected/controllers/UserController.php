<?php

class UserController extends Controller {

    public function filters() {
        return array(
            'accessControl'
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('edit', 'delete'),
                'roles' => array('supervisor')
            ),
            array('allow',
                'actions' => array('index'),
                'roles' => array('admin')
            ),
            array('deny',
                'users' => array('*')
            )
        );
    }

    public function actionDelete() {
        echo 'We are working on it';
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
