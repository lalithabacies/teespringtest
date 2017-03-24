<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HashPwd */

$this->title = 'Update Hash Pwd: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hash Pwds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hash-pwd-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
