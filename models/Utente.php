<?php

namespace newsoftsnc\accessofixeduser\models;

use yii\db\ActiveRecord;

class Utente extends ActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return 'utente';
	}

	public function behaviors(){
		return array(
			'italianDate'=>array(
				'class'=>'yiicommon.extensions.italianDateBehavior',
			),
		);
	}
	
	public function relations() {
		return array(
			'cliente'=>array(self::BELONGS_TO,'Cliente',array('id_cliente'=>'id')),
		);
	}
}