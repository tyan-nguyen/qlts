<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\bophan\models\NhanVien2Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nhan-vien-search container-fluid">
	<div class="row">
		<div class="col-12">
			<!-- card custom -->
    		<div class="card custom-card">
                <div class="card-body h-100">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <span>
                                    <button class="btn ripple btn-primary rounded-start-0" type="button">Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card custom -->
		</div>
		<div class="col-12">
		<!-- card custom -->
    		<div class="card custom-card">
                <div class="card-body h-100">
                    <?php $form = ActiveForm::begin([
                        'id'=>'myFilterForm',
                        //'action' => ['index'],
                        'method' => 'post',
                    ]); ?>
                
                    <?= $form->field($model, 'id') ?>
                
                    <?= $form->field($model, 'ma_nhan_vien') ?>
                
                    <?= $form->field($model, 'ten_nhan_vien') ?>
                
                    <?= $form->field($model, 'ngay_sinh') ?>
                
                    <?= $form->field($model, 'gioi_tinh') ?>
                
                    <?php // echo $form->field($model, 'ten_truy_cap') ?>
                
                    <?php // echo $form->field($model, 'da_thoi_viec') ?>
                
                    <?php // echo $form->field($model, 'dien_thoai') ?>
                
                    <?php // echo $form->field($model, 'email') ?>
                
                    <?php // echo $form->field($model, 'dia_chi') ?>
                
                    <?php // echo $form->field($model, 'thoi_gian_tao') ?>
                
                    <?php // echo $form->field($model, 'nguoi_tao') ?>
                
                    <div class="form-group">
                        <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton('Xóa tìm kiếm', ['class' => 'btn btn-outline-secondary']) ?>
                    </div>
                
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
	</div>

</div>
