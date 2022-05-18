<?php

/** @var yii\web\View $this */
/** @var array<app\models\Product> $products */

$this->registerJsFile('@web/js/index.js', []);
//$this->registerCssFile('@web/css/main.css',[]);
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <button class="my_button" onclick="test()">Click me!</button>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <h1><?= count($products) ?></h1>
        <?php if (count($products) > 0) : ?>
        <div class="carousel-inner">
            <?php if (count($products) > 1): ?>
                <?php for ($i = 0; $i < count($products); $i++): ?>
                    <div class="carousel-item <?php if($i == 0) echo 'active'; ?>">
                        <img src="/uploads/<?= $products[$i]->file ?>" class="d-block w-100" alt="printer">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $i + 1 ?> slide <?= $products[$i]->name ?> </h5>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <?php endif; ?>
</div>
