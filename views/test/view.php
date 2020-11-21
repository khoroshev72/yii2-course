<?
use yii\widgets\ActiveForm;
?>
<div class="col-md-12">
    <div class="row">
    <h1>Работа с моделями</h1>

    <? $form = ActiveForm::begin([
        'id' => 'my-form',
        'enableClientValidation' => true,
        'options' => [
            'class' => 'form-horizontal',
            'style' => 'margin-bottom:50px;',
        ],
        'fieldConfig' => [
            'template' => "{label} <div class='col-md-5'> {input} </div> <div class='col-md-5'> {error} </div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'],
        ]
    ]); ?>

<!--    --><?//=$form->field($model, 'code', ['enableAjaxValidation' => true])->textInput(['placeholder' => 'Код Страны']); ?>

    <?=$form->field($model, 'name', ['enableAjaxValidation' => true])->input('text', ['placeholder' => 'Название страны']) ?>

    <?=$form->field($model, 'population')->textInput(['placeholder' => 'Население']) ?>

    <?=$form->field($model, 'status')->checkbox(['template' => "<div class='col-md-2'>{label}</div><div class='col-md-5'>{input}</div><div class='col-md-5'>{error}</div>"], false); ?>

    <div class="form-group">
        <div class="col-md-5 col-md-offset-2">
            <?= yii\helpers\Html::submitButton('Отправить', ['class' => 'btn btn-default btn-block']) ?>
        </div>
    </div>
    <? ActiveForm::end() ?>
    </div>
    <table class="table">
        <? foreach ($countries as $country): ?>
        <tr>
            <td><?=$country['code'] ?></td>
            <td><?=$country['name'] ?></td>
            <td><?=$country['population'] ?></td>
            <td><?=$country['status'] ?></td>
        </tr>
        <? endforeach; ?>
    </table>
</div>
