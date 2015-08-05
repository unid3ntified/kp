<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Knowledge Sharing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	
	<?php
		if (!$model->file_id)
		{
			echo '<div class="row">
				<div class="col-md-1">#</div>
				<div class="col-md-6">Title</div>
				<div class="col-md-2">Size</div>
				<div class="col-md-3">Action</div></div>';
			foreach ($data as $key => $value) {
				echo '<div class="row">
				<div class="col-md-1">'.($key + 1).'</div>
				<div class="col-md-6">'.Html::a($value['name'], ['download', 'path' => $value['filename']]).'</div>
				<div class="col-md-2">';
				if ($value['size'] < 1048576)
					echo sprintf('%0.2f', ($value['size']/1024)).' KB</div>';
				else
					echo sprintf('%0.2f', ($value['size']/1048576)).' MB</div>';
				echo '<div class="col-md-3">'.Html::a('Delete', ['delete', 'id' => $value['id']], ['data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ]]).'</div></div>';
        	}
        }
	?>

	<br>
	<br>
	<br>
	<div align="center">			
	    <?php 
	    	if ($model->file_id)
	    	{
	    		echo '<h2>Upload Success</h2><br><br>';
	    		echo Html::a('Back', ['index'], ['class' => 'btn btn-success']);
	    	}
	    	else
	    	{
	    		$form = ActiveForm::begin([
	            	'options' => [ 'enctype' => 'multipart/form-data']
	    		]);
	    		echo $form->field($model,'file')->fileInput()->label('File (Max size: 25MB)');
	    		echo Html::submitButton('Upload this file', ['class' => 'btn btn-sm btn-primary']);
	    		ActiveForm::end();
	    	}
		?>
	</div>
</div>