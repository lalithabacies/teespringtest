<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HashPwd */
/* @var $form ActiveForm */
?>
<div class="hash-pwd">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'auth_key') ?>
        <?= $form->field($model, 'password_hash') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'password_reset_token') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- hash-pwd -->
