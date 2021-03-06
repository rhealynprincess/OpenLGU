<?php
/* @var $this AdminController */
/* @var $model Admin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php if(Yii::app()->user->getState("user_role")=="project implementor"){
				
	?>
		<div class="row">
		
		<?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>20,'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'middle_name',array('size'=>20,'maxlength'=>20,'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'middle_name'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>20,'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'sector',array('size'=>60,'maxlength'=>100,'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'user_role',array('size'=>60,'maxlength'=>100, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'user_role'); ?>
	</div>

	<?php }?>


<?php if(Yii::app()->user->getState("user_role")=="admin"){
		?>
	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sector'); ?>
		<?php echo $form->textField($model,'sector',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_role'); ?>
		<?php echo $form->textField($model,'user_role',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'user_role'); ?>
	</div>
<?php }?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
