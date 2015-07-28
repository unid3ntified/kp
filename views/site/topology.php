<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Network Topology';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-md-7">
		<?php
			$data = Yii::$app->db->createCommand('SELECT id FROM uploaded_file WHERE type = "topology"')->queryAll();
			echo '<div class="row">
				<div class="col-md-1">#</div>
				<div class="col-md-9">Image</div>
				<div class="col-md-2">Action</div></div>';
			foreach ($data as $key => $value) {
            	echo '<div class="row">
            	<div class="col-md-1">'.($key + 1).'</div>
            	<div class="col-md-9" id="sliderlist">'.Html::img(['/file','id'=>$value['id']]).'</div>
            	<div class="col-md-2">'.
            	Html::a('Delete', ['deletetopology', 'id' => $value['id']], ['data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ]]).'</div></div>';
        	}
		?>
	</div>
	<div class="col-md-3 col-md-offset-1">
		<?php
	    $form = ActiveForm::begin([
	            'options' => [ 'enctype' => 'multipart/form-data']
	    ]);
	    ?>
	    <?= '<h2>Add Network Topology</h2>' ?>
		<?= $form->field($model,'file')->fileInput(); ?>
		<div class="form-group">
	        <?= Html::submitButton('Upload', ['class' => 'btn btn-lg btn-primary']) ?>
	    </div>
	    <?php ActiveForm::end(); ?>
	    <?php 
	    	if ($model->file_id)
	    		echo '<h2>Network Topology Added</h2>';
		?>
	</div>
</div>