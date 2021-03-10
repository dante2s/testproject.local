<h1>Авторизация</h1>
<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;
$form = ActiveForm::begin(['class' =>'form-horizontal']);
?>

<?
echo $form->field($login_model,'email')->textInput(['autofocus'=>true]);
echo $form->field($login_model,'password')->passwordInput();
echo Html::submitButton('Авторизация', ['class' => 'btn btn-primary']);
?>
<?
ActiveForm::end();
?>
<p>Не зарегистрированы? <a href="/site/signup/">Регистрация</a></p>
