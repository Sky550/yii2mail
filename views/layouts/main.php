<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$language = Yii::$app->language;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Yii2 mail app',

        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    NavBar::end();    ?>

    <div class="container">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-check"></i><?= Yii::$app->session->getFlash('success') ?></h4>

            </div>
        <?php endif; ?>
        <div class="col-xs-12 col-sm-2"><nav><?=Html::a('Inbox',Url::to('index.php?r=inbox'),['class' => 'navigate col-xs-12']) ?><br>
                <?=Html::a('Outbox',Url::to('index.php?r=outbox'),['class' => 'navigate col-xs-12'])?></nav> </div>
        <div class="col-xs-12 col-sm-10"><?= $content ?></div>
    </div>
</div>
<script>
    var get_param = getUrlParameter('r');
    if (get_param.indexOf('inbox') > -1){

        $("body > div.wrap > div > div.col-xs-12.col-sm-2 > nav > a:nth-child(1)").addClass('navigate_active');
   }
   else if (get_param.indexOf('outbox') > -1){

        $("body > div.wrap > div > div.col-xs-12.col-sm-2 > nav > a:nth-child(3)").addClass('navigate_active');
   }
</script>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Sky550 <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
