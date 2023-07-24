<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use app\widgets\forms\SwitchWidget;
use kartik\select2\Select2;
use app\modules\bophan\models\BoPhan;
//use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\BoPhan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bo-phan-search">

    <?php $form = ActiveForm::begin([
        	'id'=>'myFilterForm',
            'method' => 'post',
            'options' => [
                'class' => 'myFilterForm form-horizontal'
            ],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => '<div class="col-sm-4">{label}</div><div class="col-sm-8">{input}{error}</div>',
                'labelOptions' => ['class' => 'col-md-12 control-label'],
            ],
      	]); ?>

    <?= $form->field($model, 'ma_bo_phan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_bo_phan')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'truc_thuoc')->widget(Select2::classname(), [
    		    // 'data' => BoPhan::getList(),
                'data' => (new BoPhan())->getListTree(false),
    		     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('truc_thuoc') .'...'],
    		     'pluginOptions' => [
    		         'allowClear' => true
    		     ],
    		 ]);
    	 ?>

	<?= SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_quan_ly',
	    'inForm'=>false
	]) ?>
	
	<?= SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_su_dung',
	    'inForm'=>false
	]) ?>
	
	<?= SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_bao_tri',
	    'inForm'=>false
	]) ?>
	
	<?= SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_van_tai',
	    'inForm'=>false
	]) ?>
	
	<?= SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_mua_hang',
	    'inForm'=>false
	]) ?>
	
	<?= SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_quan_ly_kho',
	    'inForm'=>false
	]) ?>
	
	<?= SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_trung_tam_chi_phi',
	    'inForm'=>false
	]) ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Tìm kiếm',['class' => 'btn btn-primary']) ?>
	        <?= Html::resetButton('Xóa tìm kiếm', ['class' => 'btn btn-outline-secondary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>