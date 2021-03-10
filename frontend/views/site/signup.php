<h1>Регистрация</h1>
<?php

use \yii\widgets\ActiveForm;
use yii\helpers\Html;
    $form = ActiveForm::begin(['class' =>'form-horizontal']);
?>

<?
    echo $form->field($model,'email')->textInput(['autofocus'=>true]);
    echo $form->field($model,'password')->passwordInput();
    echo Html::submitButton('Регистрация', ['class' => 'btn btn-primary']);
?>
<?
    ActiveForm::end();
?>
<p>Уже зарегистрированы? <a href="/site/login/">Авторизация</a></p>