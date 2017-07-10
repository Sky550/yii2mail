<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Outbox */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outbox-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'receiver',['template' => '{label}<div class="col-md-10">{input}{error}{hint}</div>'])->input('email')->label(null,['class' => 'col-md-2','style' => 'text-align:right']) ?>

    <?= $form->field($model, 'theme',['template' => '{label}<div class="col-md-10">{input}{error}{hint}</div>'])->textInput(['maxlength' => true])->label(null,['class' => 'col-md-2','style' => 'text-align:right']) ?>

    <?= $form->field($model, 'body',['template' => '{label}<div class="col-md-10">{input}{error}{hint}</div>'])->textarea(['maxlength' => true, 'rows' => 10])->label(null,['class' => 'col-md-2','style' => 'text-align:right']) ?>

    <?= $form->field($model, 'date')->hiddenInput(['value' => date('Y-m-d H:i:s')])->label(false) ?>


    <div class="form-group text-right">
        <?= Html::submitButton('Send', ['class' =>'btn btn-success']) ?>
        <?= Html::resetButton('Cancel',['class' =>'btn btn-danger'])  ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
