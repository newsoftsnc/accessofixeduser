<?php
class CActiveRecordDb extends CActiveRecord{
	// Db Connection
	private static $nsdb = null;
	
	// Reset Variabile STATIC della Connection
	public static function resetConnection() {
		self::$nsdb = null;
	}

	// Overwrite del metodo per la gestione della Connection	
	public function getDbConnection() {
		if (self::$nsdb !== null) {
			return self::$nsdb;
		} else {
			// Recupero Informazioni Utente
			if (Yii::App() instanceof CConsoleApplication) {
				$cliente=Cliente::model()->findByAttributes(array('user'=>'newsoft'));
			} else {
				$cliente=Cliente::model()->findByPk(Yii::app()->user->getState('idCliente'));
			}
	
			// Creazione Nuova Connsessione
			self::$nsdb=new CDbConnection('mysql:host='.$cliente->dbhost.';dbname='.$cliente->dbname.';charset=UTF8',$cliente->dbuser,$cliente->dbpassword);
			
			// Abilitazione Cache
			self::$nsdb->schemaCachingDuration = 86400;
				
			if (self::$nsdb instanceof CDbConnection) {
				self::$nsdb->setActive(true);
	
				return self::$nsdb;
			} else {
				throw new CDbException(Yii::t('yii','Impossibile accedere al Database.'));
			}
		}
	}
}