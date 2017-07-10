<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inbox */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inbox-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'theme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
