<?php

namespace newsoftsnc\accessofixeduser\controllers;
use yii\web\Controller;
use Yii2NsLib\AccessoFixedUser\models\LoginForm;

class AccessController extends Controller {

	public function filters() {
		return array(
			'accessControl',
		);
	}
	
	public function actionLogin() {
        
		$loginForm = new LoginForm();

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
			echo CActiveForm::validate($loginForm);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm'])) {
			$loginForm->attributes=$_POST['LoginForm'];
			$testlogin = $loginForm->validate() && $loginForm->login();
		}
//		return $this->render('//site/index', array('loginForm'=>$loginForm));
		return $this->render('login', array('loginForm'=>$loginForm));
	}

	public function actionLogout() 	{
		Yii::app()->user->logout();
//		$this->redirect(Yii::app()->homeUrl);

		$this->redirect(Yii::app()->createUrl("site/"));
	}
	
	// Filtri
	public function getFiltri($alias) {
		$aFiltri = array();
	
		return $aFiltri();
	}
}