<?php

use yii\widgets\ActiveForm;

if (Yii::$app->user->isGuest) {

	// Form
	$form = ActiveForm::begin();

	echo "<legend style='margin-bottom:10px;'>Login</legend>";

	// Utente
	echo "<div class='form-group' style='margin:0px;'>";
	echo $form->field($loginForm, 'username');
	echo "</div>";
		
	// Password
	echo "<div class='form-group' style='margin:0px;'>";
	echo $form->field($loginForm, 'password');
	echo "</div>";
		
	echo '<div class="form-actions" style="margin-bottom:0px; margin-top:5px; padding:10px;">';
//	$this->widget('booster.widgets.TbButton',
//		array(
//			'buttonType' => 'submit',
//			'context' => 'primary',
//			'label' => 'Login'
//		)
//	);
	
 	echo '</div>';

 	ActiveForm::end();
}
?>

