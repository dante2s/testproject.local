<?php

namespace app\models;

use common\models\User;
use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;
    public function rules(){
        return [
            [['email', 'password'], 'required'],
            ['email','email'],
            ['email','unique', 'targetClass'=>'common\models\User'],
            ['password','string','min'=>3, 'max'=>20]
        ];
    }
    public function signup(){
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);

        return $user->save();
    }
}
