<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            'status.name',
//            'rejection_reason:ntext',
            [

                'label' => 'Количество товаров',
                'value' => function ($data) {
                    return count($data->productOrders);
                }
            ],
            [

                'label' => 'Количество товаров',
                'value' => function ($data) {
                    $productCount = 0;
                    foreach ($data->productOrders as $item){
                        $productCount +=$item->count;
                    }
                    return $productCount;
                }
            ],
            [
                'label' => 'Список товаров',
                'format' => 'html',
                'value' => function ($data) {
                    $res = [];
                    foreach ($data->productOrders as $item) {
                        $res[] = $item->product->name.":".$item->count."штук";
                    }
                    return join('<br>', $res);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ]]); ?>


</div>
