<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php if (Yii::$app->session->getFlash('success')): ?>
        <p>Данные формы прошли валидацию</p>
    <?php else: ?>
        <p>Данные формы не прошли валидацию</p>
    <?php endif; ?>
<?php endif; ?>

<div class="page-feedback">
    <?php $form = ActiveForm::begin(['id' => 'feedback-form','class' =>'form-horizontal', 'options' => ['novalidate' => '']]); ?>
    <?php echo $form->field($model, 'name')->textInput(); ?>
    <?php echo $form->field($model, 'surname')->textInput(); ?>
    <?php echo $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7(999)-999-99-99']); ?>
    <?php echo $form->field($model, 'email')->textInput(); ?>
    <?php echo $form->field($model, 'text')->textarea(['rows' => 5]); ?>
    <?php echo $form->field($model, 'reCaptcha')->widget(
        \himiklab\yii2\recaptcha\ReCaptcha2::className(),
        [
            'siteKey' => '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI', // unnecessary is reCaptcha component was set up
        ]
    ) ?>
    <?php echo Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>

</div>
