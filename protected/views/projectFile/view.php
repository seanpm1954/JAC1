<?php
/* @var $this ProjectFileController */
/* @var $model ProjectFile */

$this->breadcrumbs=array(
	'Project Files'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectFile', 'url'=>array('index')),
	array('label'=>'Create ProjectFile', 'url'=>array('create')),
	array('label'=>'Update ProjectFile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectFile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectFile', 'url'=>array('admin')),
);
?>

<h1>View ProjectFile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'projectFile_name',
		'project_id',
	),
)); ?>
