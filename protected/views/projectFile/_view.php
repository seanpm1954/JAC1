<?php
/* @var $this ProjectFileController */
/* @var $data ProjectFile */
?>

<div class="view">

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
<!--	<br />-->


<!--    <b>--><?php //echo CHtml::encode("Company"); ?><!--:</b>-->
    <b><?php echo CHtml::encode($data->project->company->company_name); ?></b>
	<br/>
    <b><?php echo CHtml::encode($data->project->project_name); ?></b>
    <br/>
    <b><?php echo CHtml::encode($data->getAttributeLabel('projectFile_name')); ?>:</b>
<!--	--><?php //echo CHtml::encode($data->projectFile_name); ?>
<!--    --><?php //echo CHtml::link(CHtml::encode($data->projectFile_name), array('view', 'id'=>$data->id)); ?>
    <?php echo CHtml::link(CHtml::encode($data->projectFile_name), Yii::app()->baseUrl . '/uploads/' . $data->projectFile_name,array('target'=>'_blank')); ?>
	<br />



</div>