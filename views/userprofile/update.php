<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userprofile */

$this->title = 'Update Userprofile: ' . $model->profileid;
$this->params['breadcrumbs'][] = ['label' => 'Userprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->profileid, 'url' => ['view', 'id' => $model->profileid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
