<?php

/* @var $this yii\web\View */

$this->title = 'Книги и Авторы';

use yii\helpers\Url; ?>
<div class="site-index">

    <div class="jumbotron">
        <h2>А какую выберешь ты?</h2>

        <a class="btn btn-lg red" href="<?= Url::to(['show/authors'])?>">Авторы</a>
        <a class="btn btn-lg blue" href="<?= Url::to(['show/books'])?>">Книги</a>
    </div>
</div>