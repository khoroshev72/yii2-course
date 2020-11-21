<h1>Связи моделей</h1>

<?// foreach ($products as $product): ?>
<!--<h4>Продукт --><?//=$product->title ?><!--</h4>-->
<!--<p>Категория --><?//=$product->category->title ?><!--</p>-->
<?// endforeach; ?>


<?= \app\components\HelloWidget::widget(['name' => 'Eugene']) ?>

<? foreach ($categories as $category): ?>
<h1><?=$category->title ?></h1>
<? foreach ($category->getProducts()->all() as $product): ?>
    <p><?=$product->title ?> | <?=$product->price ?> $</p>
<? endforeach; ?>
<? endforeach; ?>

