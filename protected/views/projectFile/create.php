<?php
/* @var $this ProjectFileController */
/* @var $model ProjectFile */

$this->breadcrumbs=array(
	'Project Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectFile', 'url'=>array('index')),
	array('label'=>'Manage ProjectFile', 'url'=>array('admin')),
);
?>

<h1>Create ProjectFile</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>