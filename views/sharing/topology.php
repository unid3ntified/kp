<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Network Topology';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<?php
		if (!$model->file_id)
		{
			echo '<div class="col-md-1">#</div>
				<div class="col-md-10">Image/File</div>
				<div class="col-md-1">Action</div></div>';
			foreach ($data as $key => $value) {
				$pos = (strrpos($value['name'],".") + 1);
				$length = (strlen($value['name']) - $pos);
				$format = substr($value['name'],$pos,$length);

	        	echo '<div class="row">
	        	<div class="col-md-1">'.($key + 1).'</div><div class="col-md-10" id="sliderlist">';
	        	if (in_array(strtolower($format), $support))
	        		echo Html::a(Html::img(['/file','id'=>$value['id']]), ['/file', 'id'=>$value['id']]);
	        	else 
	        		echo Html::a($value['name'], ['download', 'path' => $value['filename']]);
	        	echo '</div><div class="col-md-1">'.
	        	Html::a('Delete', ['deletetopology', 'id' => $value['id']], ['data' => [
	                'confirm' => 'Are you sure you want to delete this item?',
	                'method' => 'post',
	            ]]).'</div></div>';
	    	}
	    }
	?>
</div>
<br>
<br>
<br>
<div class="row" align="center">
	<div class="col-md-5 col-md-offset-4">
	    <?php 
	    	if ($model->file_id)
	    	{
	    		echo '<h3>Network Topology Added</h3><br><br>';
	    		echo Html::a('Back', ['topology'], ['class' => 'btn btn-success']);
	    	}
	    	else
	    	{
	    		$form = ActiveForm::begin([
	            	'options' => [ 'enctype' => 'multipart/form-data']
	    		]);
	    		echo $form->field($model,'file')->fileInput()->label('JPEG, PNG, BMP or GIF File (Max size: 25MB)');
	    		echo Html::submitButton('Upload this file', ['class' => 'btn btn-sm btn-primary']);
	    		ActiveForm::end();
	    	}
		?>
	</div>
</div>
