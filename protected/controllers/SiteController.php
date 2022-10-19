<?php

class SiteController extends Controller {

    public function actionError() {
        $this->renderPartial('page_not_found');
        Yii::app()->end();
    }

    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $this->render('guest');
            Yii::app()->end();
        }
        $user = User::model()->findByPk(Yii::app()->user->id);
        $this->render('index', ['username' => $username]);
        Yii::app()->end();
    }

}
