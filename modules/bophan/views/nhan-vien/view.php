<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhanVien */
?>
<div class="nhan-vien-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_nhan_vien',
            'ten_nhan_vien',
            'ngay_sinh',
            'gioi_tinh',
            'ten_truy_cap',
            'da_thoi_viec',
            'dien_thoai',
            'email:email',
            'dia_chi:ntext',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>