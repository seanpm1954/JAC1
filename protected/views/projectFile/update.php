<?php
/* @var $this ProjectFileController */
/* @var $model ProjectFile */

$this->breadcrumbs=array(
	'Project Files'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectFile', 'url'=>array('index')),
	array('label'=>'Create ProjectFile', 'url'=>array('create')),
	array('label'=>'View ProjectFile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectFile', 'url'=>array('admin')),
);
?>

<h1>Update ProjectFile <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>