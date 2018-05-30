<?php

namespace newsoftsnc\accessofixeduser\models;

class Cliente extends CActiveRecord {
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return 'cliente';
	}
	
	public function behaviors() {
		return array(
			'italianDate'=>array(
				'class'=>'yiicommon.extensions.italianDateBehavior',
			),
		);
	}
	
	public function setDbrel($id, $dbrel) {
	
		// Recupero Cliente
		$cliente = Cliente::model()->findByPk($id);
	
		if ($cliente) {
			$cliente->dbrel = $dbrel;
			$cliente->save();
		}
	}
	
	public function numeroUtenti() {
		return 1;
	}
	
	public function multiUtente() {
		return false;
	}
}