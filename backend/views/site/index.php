<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $filters \backend\controllers\SiteController */

$request = Yii::$app->request;

$get = $request->get();
if($get){
    $url = $request->url.'&';
}
else{
    $url = $request->url.'?';
}
$this->title = 'My Yii Application';

?>
    <div class="row">
        <div class="col-md-12">
            <?php
            echo '<p>'.$dataProvider->sort->link('name').'</p>';
            echo '<p>'.$dataProvider->sort->link('surname').'</p>';
            echo '<p>'.$dataProvider->sort->link('phone').'</p>';
            echo '<p>'.$dataProvider->sort->link('email').'</p>';
            ?>
        </div>
        <div class="col-md-6">
            <?php
            foreach ($dataProvider->getModels() as $item): ?>
                <div class="news-item">
                    <h2><?php echo Html::encode($item->name) ?></h2>
                    <p>Фамилия: <?php echo HtmlPurifier::process($item->surname) ?></p>
                    <p>Телефон: <?php echo HtmlPurifier::process($item->phone) ?></p>
                    <p>E-mail: <?php echo HtmlPurifier::process($item->email) ?></p>
                    <p>Сообщение: <?php echo HtmlPurifier::process($item->text) ?></p>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-md-6">
            <h3>Фильтры</h3>
            <?php
            foreach ($filters as $m=>$filter){
                echo '<p>Фильтр - '.$m.'</p>';
                $filter = array_unique($filter);
                foreach ($filter as $filter_elem){
                    echo '<p><a href="' . $url . 'UserSearch[' . $m . ']=' . $filter_elem . '">' . $filter_elem . '</a></p>';
                }
            }
            ?>
        </div>
    </div>
