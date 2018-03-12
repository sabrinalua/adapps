<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TblList */

$this->title = 'Create Tbl List';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
