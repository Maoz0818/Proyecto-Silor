<?php

namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nombre_completo;
    public $cedula;
    public $telefono;
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['nombre_completo', 'filter', 'filter' => 'trim'],
            ['nombre_completo', 'required'],
            ['nombre_completo', 'string', 'max' => 255],

            ['cedula', 'filter', 'filter' => 'trim'],
            ['cedula', 'required'],
            ['cedula', 'string', 'max' => 35],

            ['telefono', 'filter', 'filter' => 'trim'],
            ['telefono', 'required'],
            ['telefono', 'string', 'max' => 32],
            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->nombre_completo = $this->nombre_completo;
        $user->cedula = $this->cedula;
        $user->telefono = $this->telefono;
        $user->email = $this->email;
        $user->setPassword($this->nombre_completo, $this->cedula);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }

}