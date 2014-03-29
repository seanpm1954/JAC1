<?php
/* @var $this ProjectFileController */
/* @var $model ProjectFile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-file-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'projectFile_name'); ?>
<!--		--><?php //echo $form->textField($model,'projectFile_name',array('size'=>50,'maxlength'=>50)); ?>
<!--		--><?php //echo $form->error($model,'projectFile_name'); ?>
<!--	</div>-->

<!--    if Admin use this-->

    <?php  if(Yii::app()->user->access == 1 || Yii::app()->user->access == 3){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'project_id'); ?>
        <?php echo $form->dropDownList($model,'project_id',$model->getProjects()); ?>
		<?php echo $form->error($model,'project_id'); ?>
	</div>
     <?php }else { ?>
    <!--clients use this-->
        <div class="row">
            <?php echo $form->labelEx($model,'project_id'); ?>
            <?php echo $form->dropDownList($model,'project_id',$model->getMyProjects()); ?>
            <?php echo $form->error($model,'project_id'); ?>
        </div>


    <?php } ?>
<?php echo $model->message; ?>
    <div class="row">
    <?php echo $form->labelEx($model, 'uploadFile'); ?>
    <?php echo $form->fileField($model, 'uploadFile'); ?>
    <?php  echo $form->error($model, 'uploadFile'); ?>
     </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->