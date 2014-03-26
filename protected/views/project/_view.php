<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode("Edit"), array('update', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
	<?php echo CHtml::encode($data->project_name); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('user_id')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->user_id); ?>
<!--	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
    <?php echo CHtml::encode($data->getCompName1($data->company_id)); ?>
	<br />


</div>