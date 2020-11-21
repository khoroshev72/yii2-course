<?php

namespace app\controllers;

use app\assets\AppAsset;
use app\models\Country;
use app\models\EntryForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class TestController extends Controller
{

    public function actionIndex()
    {
        $model = new EntryForm();
//        if ($model->load(\Yii::$app->request->post()) && $model->validate()){
//            if (\Yii::$app->request->isPjax){
//                \Yii::$app->session->setFlash('pjax', 'OK');
//                $model = new EntryForm();
//            } else {
//                \Yii::$app->session->setFlash('nopjax', 'OK');
//                return $this->refresh();
//            }
//        }
        $model->load(\Yii::$app->request->post());
        if (\Yii::$app->request->isAjax){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->validate()){
                return ['message' => 'ok'];
            } else {
                return ActiveForm::validate($model);
            }
        }
        return $this->render('index', compact('model'));
    }

    public function actionView($code = '')
    {
        $this->view->title = 'Работа с моделями';

        //Чтение данных

//        $code = 'FR';
//        $population = 100000000;
//
//        $countries = Country::find()->where("population < :population AND code <> :code", [':code' => $code, ':population' => $population])->all();

        //$countries = Country::find()->where(['code' => ['FR', 'AU', 'DE'], 'status' => 1])->all();

        //$countries = Country::find()->where(['like', 'name', 'ni'])->all();

        $countries = Country::find()->orderBy('population DESC')->all();

        //$countries = Country::find()->count();
        //debug($countries, 1);

//        $countries = Country::find()->where('population > 100000000')->limit(1)->one();
//        debug($countries, 1);

        //Операция Create

//        $model = new Country();
//
//        if (\Yii::$app->request->isAjax){
//            $model->load(\Yii::$app->request->post());
//            \Yii::$app->response->format = Response::FORMAT_JSON;
//            return ActiveForm::validate($model);
//        }
//
//        if ($model->load(\Yii::$app->request->post()) && $model->save()){
//            \Yii::$app->session->setFlash('success', 'Данные сохранены');
//            return $this->refresh();
//        }
//        $model->code = 'UA';
//        $model->name = 'Ukraine';
//        $model->population = 4840000;
//        $model->status = 1;
//        if ($model->save()){
//            \Yii::$app->session->setFlash('success', 'Данные сохранены');
//        } else {
//            \Yii::$app->session->setFlash('error', 'Ошибка');
//        }

//        Операция Update

        $model = Country::findOne('AU');
        if (!$model){
            throw new NotFoundHttpException('Страница не найдена');
        }

        if ($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success', 'Данные сохранены');
            return $this->refresh();
        }

//        Операция Delete

        $country = Country::findOne($code);
        if ($country){
            if (false !== $country->delete()){
                \Yii::$app->session->setFlash('success', 'Запись удалена');
            } else {
                \Yii::$app->session->setFlash('error', 'error');
            }
        }
        return $this->render('view', compact('countries', 'model'));
    }

}