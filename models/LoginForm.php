<?php

namespace newsoftsnc\accessofixeduser\models;

use yii\base\Model;

class LoginForm extends Model {
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	public function rules() {
		return array(
			array('username, password', 'required'),
			array('rememberMe', 'boolean'),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels() {
		return array(
			'rememberMe'=>' Ricordami la prossima volta',
			'username'=>'Codice Utente',
			'password'=>'Password',
		);
	}

	public function authenticate($attribute,$params) {
		if(!$this->hasErrors()) {
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate()) {
				$this->addError('password','Codice utente o password errati.');
			}
		}
	}

	public function login() {
		if($this->_identity===null) {
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		} else {
			return false;
		}
	}
}
