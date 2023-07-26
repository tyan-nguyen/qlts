<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\modules\kholuutru\models\KhoLuuTru;
use app\modules\bophan\models\BoPhan;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use app\modules\bophan\models\NhanVien;

/* @var $this yii\web\View */
/* @var $model app\modules\kholuutru\models\KhoLuuTru */
/* @var $form yii\widgets\ActiveForm */

$newArr = [];
if($model->isNewRecord){
    if($model->id_nguoi_quan_ly != null){
        $nv = NhanVien::findOne($model->id_nguoi_quan_ly);
        if($nv != null){
            $newArr = [$model->id_nguoi_quan_ly => $nv->ten_nhan_vien];
            //$newArr = NhanVien::getListThuocBoPhan($model->id_nguoi_quan_ly);
        }
    }
}

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

    <?php //$form->field($model, 'id_nguoi_quan_ly')->textInput() ?>

    <?php // $form->field($model, 'id_bo_phan_quan_ly')->textInput() ?>
    
    <?php // $form->field($model, 'id_bo_phan_quan_ly')->dropDownList((new BoPhan())->getListTree(), ['prompt'=>'-Chọn-', 'id'=>'id-bo-phan']) ?>
    
     <?= $form->field($model, 'id_bo_phan_quan_ly')->widget(Select2::classname(), [
             'data' => (new BoPhan())->getListTree(),
		     'options' => [
		         'id'=>'id-bo-phan',
		         'placeholder' => 'Chọn '. $model->getAttributeLabel('id_bo_phan_quan_ly') .'...'
		     ],
		     'pluginOptions' => [
		         'allowClear' => true,
		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
		     ],
		 ]);
	 ?>        
    <?php 
    
        //echo Html::hiddenInput('input-type-1', $model->id_bo_phan_quan_ly, ['id' => 'input-type-1']);
        //echo Html::hiddenInput('input-type-2', $model->id_nguoi_quan_ly, ['id' => 'input-type-2']);
        echo $form->field($model, 'id_nguoi_quan_ly')->widget(DepDrop::classname(), [
            'options'=>['id'=>'id-nhan-vien','placeholder' => 'Select ...'],
            'data' => $model->isNewRecord?$newArr:[$model->id_nguoi_quan_ly=>$model->nguoiQuanLy->ten_nhan_vien],
            //'data' => $model->isNewRecord?$newArr:NhanVien::getListThuocBoPhan($model->id_nguoi_quan_ly),
            'type'=>DepDrop::TYPE_SELECT2,
            'select2Options'=>[
                'pluginOptions' => [
                    'allowClear' => true,
                    //'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
                ],
            ],
            'pluginOptions'=>[
                'depends'=>['id-bo-phan'],
                //'initialize' => true,
                //'placeholder'=>'Select...',
                'url'=>Url::to(['/kholuutru/depdrop/get-nhan-vien']),
                //'params' => ['input-type-1', 'input-type-2']
            ],
           /*  'pluginEvents' => [

                "depdrop:change"=>"function(event, id, value, count) { $('#id-bo-phan').select2('val', value); }",
                "depdrop:beforeChange"=>"function(event, id, value) { }",
                "depdrop:afterChange"=>"function(event, id, value) { }",
            ] */
        ]);
   ?>
    		
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
