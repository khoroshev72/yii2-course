<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>
<div class="row">
    <div class="col-md-12">
        <h1>Страница с формой</h1>
<!--        --><?// Pjax::begin() ?>
            <? $form = ActiveForm::begin([
                    'id' => 'my-form',
                    'enableClientValidation' => true,
                    'options' => [
                            'class' => 'form-horizontal',
//                            'data-pjax' => false,
                    ],
                    'fieldConfig' => [
                    'template' => "{label} <div class='col-md-5'> {input} </div> <div class='col-md-5'> {error} </div>",
                    'labelOptions' => ['class' => 'col-md-2 control-label'],
                ]
            ]) ?>
                <?=$form->field($model, 'name', [
                        'template' => "{label} <div class='col-md-5'> {input} </div> <div class='col-md-5'> {hint} </div> <div class='col-md-5'> {error} </div>",
                        'labelOptions' => ['class' => 'col-md-2 control-label'],
                ])->hint('Введите поле имя')->textInput(['placeholder' => 'Введите имя'])->label('Имя') ?>

                <?=$form->field($model, 'email')->input('email', ['placeholder' => 'Введите email']) ?>

                <?=$form->field($model, 'topic', ['enableAjaxValidation' => true])->textInput(['placeholder' => 'Тема сообщения']) ?>

                <?=$form->field($model, 'text')->textarea(['rows' => 5]) ?>

                <div class="form-group">
                    <div class="col-md-5 col-md-offset-2">
                    <?= yii\helpers\Html::submitButton('Отправить', ['class' => 'btn btn-default btn-block']) ?>
                    </div>
                </div>
            <? ActiveForm::end() ?>
<!--        --><?// Pjax::end() ?>
    </div>
</div>

<?
$js = <<<JS
let form = $('#my-form');
form.on('beforeSubmit', function(e) {
    e.preventDefault();
  let data = form.serialize();
  $.ajax({
  url: form.attr('action'),
  type: 'POST',
  data: data,
  success: function(res) {
    console.log(res);
    form[0].reset();
  },
  error: function() {
    alert('Error');
  }
  });
});
JS;

$this->registerJs($js);

?>


