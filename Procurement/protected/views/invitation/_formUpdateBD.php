<?php
/* @var $this InvitationController */
/* @var $model Invitation */
/* @var $form CActiveForm */
?>

<?php 
	$options = new OptionRecord();
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invitation-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>"multipart/form-data"),
)); ?>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $model->title; ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<br/><br/>
	<?php echo $form->errorSummary($model);
		if(isset($error)){ 
			echo '<span class="error">'.$error.'</span>';
		}
		

		$criteria=new CDbCriteria();
$criteria->condition="id='$model->id'";
$result= BidDocs::model()->findAll($criteria);
		
		if(count($result)!=0){
		echo '<b>Files Uplaoded</b>:<br>';
		foreach($result as $doc){
			$pdf= explode(".pdf", $doc->bidding_document);
			if($pdf[0]!="")echo ' <a href="files/bd/'.$doc->bidding_document.'">'.$pdf[0].'.pdf</a>';
			echo '<br/>';
			//echo '<b>Date last modified</b>: '.$doc->date_last_modified.' '.$model->time_last_modified;
			echo '<br/>';
		}
	}
		
		
		
		echo '<input accept="application/pdf" type="file" name="file" id="file" required="required"/>'; 
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
