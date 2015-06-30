<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Information';
$this->params['breadcrumbs'][] = '';
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <details>
    	<summary class="detail-1">
    		GT
    	</summary>
    	<details>
    		<summary class="detail-2">
    		GT Rule
    		</summary>
    		<br>
	    	<?= GridView::widget([
		        'dataProvider' => $GRdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'STP',
		            'Area',
		            'Equipment',
		            'GT',
		            'Last_counter',
		            'Remark',
		        ]]);
		    ?>
		</details>
	    <details>
    		<summary class="detail-2">
    		GT Proposed List
    		</summary>
		    <br>
		    <?= GridView::widget([
		        'dataProvider' => $GPdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'Regional',
		            'MSS',
		            'GT',
		            'new_GT',
		            'Status',
		            'Remark',
		        ]]);
	    	?>
	    </details>
    </details>
    <br>
    
    <details>
    	<summary class="detail-1">
    		MSRN
    	</summary>
    	<details>
    		<summary class="detail-2">
    		MSRN Rule
    		</summary>
    		<br>
	    	<?= GridView::widget([
		        'dataProvider' => $MRuledataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'cmn',
		            'area',
		            'equipment',
		            'new_msrn',
		            'last_counter',
		            'remark',
		        ]]);
		    ?>
		</details>
	    <details>
    		<summary class="detail-2">
    		MSRN Routing
    		</summary>
		    <br>
		    <?= GridView::widget([
		        'dataProvider' => $MRoutingdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'cluster',
		            'mss',
		            'first_route',
		            'second_route',
		            'remark',
		        ]]);
	    	?>
	    </details>
	    <details>
    		<summary class="detail-2">
    		MSRN Proposed List
    		</summary>
		    <br>
		    <?= GridView::widget([
		        'dataProvider' => $MPdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		           'Regional',
		            'MSS',
		            'Existing_MSRN',
		            'New_MSRN',
		            'Status',
		            'Reserved_by',
		            'Updated',
		            'Remark',
		        ]]);
	    	?>
	    </details>
	    <details>
    		<summary class="detail-2">
    		PABX Info
    		</summary>
		    <br>
		    <?= GridView::widget([
		        'dataProvider' => $PIdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'Regional',
		            'LAC',
		            'DN',
		            'Remark',
		        ]]);
	    	?>
	    </details>
    </details>
    <br>

	<details>
    	<summary class="detail-1">
    		SPC
    	</summary>
    	<details>
    		<summary class="detail-2">
    		SPC Rule
    		</summary>
    		<br>
	    	<?= GridView::widget([
		        'dataProvider' => $SRdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		           	'Area',
		            'SPC',
		            'Jenis',
		            'Last_counter',
		            'Remark',
		        ]]);
		    ?>
		</details>
	    <details>
    		<summary class="detail-2">
    		SPC Ran Sharing
    		</summary>
		    <br>
		    <?= GridView::widget([
		        'dataProvider' => $SRSdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'SPC',
		        ]]);
	    	?>
	    </details>
	    <details>
    		<summary class="detail-2">
    		SCT Port Huawei
    		</summary>
		    <br>
		    <?= GridView::widget([
		        'dataProvider' => $SPHdataProvider,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'mss_huawei',
		            'sctp_port',
		            'last_counter',
		            'Remark',
		        ]]);
	    	?>
	    </details>
    </details>
    <br>
</div>
