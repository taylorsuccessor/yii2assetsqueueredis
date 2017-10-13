<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\Pagination;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">

    <h1><?= Html::encode($this->title) ?> </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'name',
            'email:email',
            'phone',
            'birth_day',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],

        'layout' => '{summary}{errors}{items}{pager}',

        'rowOptions' => function ($model, $key, $index, $grid) {
        },
        'emptyText' => 'No Results',
        'showFooter' => true,

    ]); ?>


</div>
