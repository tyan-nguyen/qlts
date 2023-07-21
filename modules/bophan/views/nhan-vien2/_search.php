<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhanVien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhan-vien-search">

    <?php $form = ActiveForm::begin([
        	'id'=>'myFilterForm',
            'method' => 'post',
            'options' => [
                'class' => 'myFilterForm'
            ]
      	]); ?>

    <?= $form->field($model, 'id_bo_phan')->textInput() ?>

    <?= $form->field($model, 'ma_nhan_vien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_nhan_vien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gioi_tinh')->textInput() ?>

    <?= $form->field($model, 'ten_truy_cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'da_thoi_viec')->textInput() ?>

    <?= $form->field($model, 'dien_thoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Tìm kiếm',['class' => 'btn btn-primary']) ?>
	        <?= Html::resetButton('Xóa tìm kiếm', ['class' => 'btn btn-outline-secondary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
