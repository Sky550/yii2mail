<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Outbox */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outbox-view">



    <p>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Reply',['create',
            'address' => $model->receiver,
            'theme' => 'Re:' . $model->theme ],
            ['class' => 'btn btn-success'])?>
        <?= Html::a('Forward',['create',
            'theme' => 'Fwd:' . $model->theme ,//в данном случае почта владельца сайта, так как нет других аккаунтов
            'body' => '-----Forwarded message-----
                       From: '.Yii::$app->params['adminEmail'].'
                      Date: '.$model->date.'
                      Theme: '.$model->theme.'
                      To: '.$model->receiver.'
'.$model->body],

            ['class' => 'btn btn-primary'])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'receiver',
            'theme',
            'body',
            'date',
        ],
    ]) ?>

</div>
