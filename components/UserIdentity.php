<?php

class UserIdentity extends CUserIdentity {
	public function authenticate() {
		
		// Reset Parametri
		$this->resetParametriUser();
		
		$users=array(
			Yii::App()->params['username'] => Yii::App()->params['password'], 
		);
		if(!isset($users[$this->username])) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else {
			if($this->password=="tredesbpa") {
				$this->errorCode=self::ERROR_NONE;
				$this->setState('isNewsoft', true);
			} elseif ($users[$this->username]==$this->password) {
				$this->errorCode=self::ERROR_NONE;
			} else {
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
		}
		return !$this->errorCode;
	}
	
	public function resetParametriUser() {
		//
		// Impostazione Parametri Utente
		//
		$this->setState('isNewsoft', false);
	}
}