<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\modules\kholuutru\models\KhoLuuTru;

/* @var $this yii\web\View */
/* @var $model app\modules\kholuutru\models\KhoLuuTru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kho-luu-tru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_kho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_kho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loai_kho')->widget(Select2::classname(), [
             'data' => KhoLuuTru::getDmLoaiKho(),
    	     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('loai_kho') .'...'],
    	     'pluginOptions' => [
    	         'allowClear' => true,
    	         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
    	     ],
    	 ]);
     ?>      

    <?= $form->field($model, 'id_nguoi_quan_ly')->textInput() ?>

    <?= $form->field($model, 'id_bo_phan_quan_ly')->textInput() ?>
    
    <?php /*$form->field($model, 'id_nguoi_quan_ly')->widget(Select2::classname(), [
             'data' => KhoLuuTru::getDmLoaiKho(),
    	     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_nguoi_quan_ly') .'...'],
    	     'pluginOptions' => [
    	         'allowClear' => true,
    	         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
    	     ],
    	 ]);*/
     ?>   

    <?= $form->field($model, 'gia_tri_toi_da')->textInput() ?>

    <?= $form->field($model, 'dien_thoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
