<?php
/* @var $this CommentController */
/* @var $data Comment */
?>
<div class="view" style='padding-bottom:50px;'>

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_program_no')); ?>:</b>
	<?php echo CHtml::encode($data->project_program_no); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('project_program_title')); ?>:</b>
	<?php echo CHtml::encode($data->project_program_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user')); ?>:</b>
	<?php echo CHtml::encode($data->user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved')); ?>:</b>
	<?php echo CHtml::encode($data->approved); ?>
	<br />
	
<div style='width:20%;float:left;'>
	<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>CHtml::normalizeUrl('index.php?r=comment/approve&id='.$data->id),
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
			'enctype'=>'multipart/form-data',
			),
)); ?>

	
	<?php echo $form->errorSummary($data); ?>


	<div class="row">
		<?php echo $data->id;?>
		<?php echo $form->textField($data,'content', array('hidden'=>'hidden')); ?>
		<?php echo $form->error($data,'content'); ?>
	</div>

		<div class="row">
	
		<?php echo $form->textField($data,'date', array('hidden'=>'hidden')); ?>
		<?php echo $form->error($data,'date'); ?>
	</div>

		<div class="row">
	
		<?php echo $form->textField($data,'user',array('size'=>60,'maxlength'=>100, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($data,'user'); ?>
	</div>

		<div class='row'>
		<?php echo $form->textField($data,'project_program_no',array('size'=>60,'maxlength'=>200, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($data,'project_program_no'); ?>
	</div>


	<div class='row'>
		<?php echo $form->textField($data,'project_program_title',array('size'=>60,'maxlength'=>200, 'hidden'=>'hidden')); ?>
		<?php echo $form->error($data,'project_program_title'); ?>
	</div>



	<div class="row">
	
		<?php echo $form->textField(Comment::model(),'approved', array('hidden'=>'hidden', 'value'=>"yes")); ?>		
		<?php echo $form->error(Comment::model(),'approved'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($data->isNewRecord ? 'Approve' : 'Approve'); ?>
	</div>

</div>
<?php $this->endWidget(); ?>
<div style='float:left;width:18%;'>
	<?php echo CHtml::button('Delete', array('submit' => array('comment/delete', 'id'=>$data->id)));
?>
</div>

</div>
