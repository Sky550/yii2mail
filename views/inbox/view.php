<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inbox */


$this->params['breadcrumbs'][] = ['label' => 'Inboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbox-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Reply',['outbox/create',
            'address' => $model->sender,
            'theme' => 'Re:' . $model->theme ],
            ['class' => 'btn btn-success'])?>
        <?= Html::a('Forward',['outbox/create',
            'theme' => 'Fwd:' . $model->theme ,//в данном случае почта владельца сайта, так как нет других аккаунтов
            'body' => '-----Forwarded message-----
                       From: '.$model->sender.'
                      Date: '.$model->date.'
                      Theme: '.$model->theme.'
                      To: '.Yii::$app->params['adminEmail'].'
'.$model->body],

            ['class' => 'btn btn-primary'])?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sender',
            'theme',
            'body',
            'date',
        ],
    ]) ?>

</div>
