
<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();
/*
if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}*/
?>


<?php
/* @var $this ReportController */
/* @var $model Report */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->fileField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
<?php $date=getdate(date("U"));
		$current=$date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];?>
	<div class="row">
		
		<?php echo $form->textField($model,'date',array('value'=>$current, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'sector',array('value'=>Yii::app()->user->getState('user_sector'), 'hidden'=>'hidden')); ?>
		<?php echo $form->error($model,'sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('maxLength'=>200, 'size'=>60)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<?php $name=Yii::app()->user->getState('user_first_name')." ".Yii::app()->user->getState('user_middle_name')." ".Yii::app()->user->getState('user_last_name');?>
	<div class="row">
		<?php echo $form->textField($model,'submittedBy',array('hidden'=>'hidden', 'value'=>$name)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
