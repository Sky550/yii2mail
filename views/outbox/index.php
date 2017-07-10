<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OutboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Outboxes';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="outbox-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Send Letter', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete Selected', [''], ['class' => ' btn btn-danger ','id' => 'deleteButton']) ?>
    </p>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => 'There is no letters that meet the requirements',
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn'
            ],

            [   'attribute'=>'receiver',
                'format' => 'html',
                'value' => function ($model) {
                return Html::a(StringHelper::truncate($model->receiver, 15),'/index.php?r=outbox%2Fcreate&address='.$model->receiver);}],
            [
                'class' => 'app\components\grid\CombinedDataColumn',
                'labelTemplate' => '{0}  -  {1}',
                'valueTemplate' => '{0}  -  {1}',
                'labels' => [
                    'Theme',
                    ' Body ',
                ],
                'attributes' => [
                    'theme:html',
                    'body:html',
                ],
                'values' => [
                    function ($model, $_key, $_index, $_column) {
                        return  Html::a(StringHelper::truncate($model->theme, 15),'index.php?r=outbox%2Fview&id='.$model->id);},
                    function ($model, $_key, $_index, $_column) {
                        return HTML::a(StringHelper::truncate($model->body, 100),'index.php?r=outbox%2Fview&id='.$model->id);

                    }
                ],
                'sortLinksOptions' => [
                    ['class' => 'text-nowrap'],
                    null,
                ],
            ],

            [   'attribute' => 'date',
                'format' => 'datetime',
                'contentOptions' => ['style' => 'width:250px;  min-width:230px;  '],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'begin_date',
                    'attribute2' => 'end_date',
                    'type' => DatePicker::TYPE_RANGE,
                    'separator' => '-',
                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
                ]),
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'header' => HTML::a('x',Url::to([null,null]),['title' => 'Clear filters'])]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
<?php

$this->registerJs(' 
    $(document).ready(function(){
    $(\'#deleteButton\').click(function(){
   var r = confirm("Are you sure?");
   if ( r == true){
var param = $(\'meta[name=csrf-param]\').attr("content");
var token = $(\'meta[name=csrf-token]\').attr("content"); 
        var InId = $(\'#w0\').yiiGridView(\'getSelectedRows\');
          $.ajax({
            type: \'POST\',
            url : \'index.php?r=outbox/multiple-delete\',
            data : {row_id: InId, param : token},
            success : function() {
              $(this).closest(\'tr\').remove(); 
            }
                });
                    }    });
    });', \yii\web\View::POS_READY);
?>

