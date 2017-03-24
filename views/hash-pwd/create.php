<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HashPwd */

$this->title = 'Create Hash Pwd';
$this->params['breadcrumbs'][] = ['label' => 'Hash Pwds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hash-pwd-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
