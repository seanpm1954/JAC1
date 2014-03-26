<?php
/* @var $this ProjectFileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Project Files',
);

$this->menu=array(
	array('label'=>'Create ProjectFile', 'url'=>array('create')),
	array('label'=>'Manage ProjectFile', 'url'=>array('admin')),
);
?>

<h1>Project Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
