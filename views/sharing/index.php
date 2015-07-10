<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Knowledge Sharing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-8">
		<?php
			$data = Yii::$app->db->createCommand('SELECT name FROM uploaded_file')->queryColumn();
			foreach ($data as $key => $value) {
            	echo $value.'<br>';
        }
		?>
	</div>
	<div class="col-md-4">
		<?php
	    $form = ActiveForm::begin([
	            'options' => [ 'enctype' => 'multipart/form-data']
	    ]);
	    ?>
	    <?= '<h2>Upload File</h2>' ?>
		<?= $form->field($model,'file')->fileInput(); ?>
		<div class="form-group">
	        <?= Html::submitButton('Upload', ['class' => 'btn btn-lg btn-primary']) ?>
	    </div>
	    <?php ActiveForm::end(); ?>
	    <?php 
	    	if ($model->file_id)
	    		echo '<h2>Upload Success</h2>';
		?>
	</div>
</div>