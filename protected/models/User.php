<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $role
 * @property string $create_time
 * @property string $update_time
 * @property string $last_activity
 */
class User extends CActiveRecord {

    public function tableName() {
        return 'user';
    }

    public function rules() {
        return array(
            array('username, password, role, create_time, update_time, last_activity', 'required'),
            array('username', 'length', 'max' => 45),
            array('password', 'length', 'max' => 256),
            array('email', 'length', 'max' => 90),
            array('role', 'length', 'max' => 15),
            array('id, username, password, email, role, create_time, update_time, last_activity', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t("translation", "id"),
            'username' => Yii::t("translation", "username"),
            'password' => Yii::t("translation", "password"),
            'email' => Yii::t("translation", "email"),
            'role' => Yii::t("translation", "role"),
            'create_time' => Yii::t("translation", "create_time"),
            'update_time' => Yii::t("translation", "update_time"),
            'last_activity' => Yii::t("translation", "last_activity"),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('last_activity', $this->last_activity, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $this->password = md5($this->password);
        return parent::beforeSave();
    }

}
