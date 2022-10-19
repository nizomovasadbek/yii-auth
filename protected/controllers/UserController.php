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
                'actions' => array('index', 'edit'),
                'roles' => array('admin')
            ),
            array('deny',
                'users' => array('*')
            )
        );
    }

    public function actionIndex() {
        $users = User::model()->findAll();
        Yii::app()->user->changeLastActivity();
        $this->render('index', ['users' => $users]);
        Yii::app()->end();
    }

    public function actionEdit($id) {
        $user = User::model()->findByPk($id);
        $model = new EditUserForm();

        $this->render('edit', ['model' => $model, 'user' => $user]);
        Yii::app()->end();
    }

}
