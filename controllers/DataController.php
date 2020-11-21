<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\web\Controller;

class DataController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = 'Связи моделей';

        $categories = Category::find()->with('products')->all();
        //$products = $categories->getProducts(1500)->all();
        //$products = Product::find()->all();

        return $this->render('index', ['categories' => $categories, 'products' => $products]);
    }
}