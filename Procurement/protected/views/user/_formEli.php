<?php
/* @var $this BidController */
/* @var $model Bid */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bid-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>"multipart/form-data"),
)); ?>

	<?php echo $form->errorSummary($model);
		if(isset($error)){ 
			echo '<span class="error">'.$error.'</span>';
		} 
	?>
	<div class="row">
		<?php echo '<b>Organization:</b>'; ?>
		<?php echo $form->hiddenField($model,'id');
			$org = Organization::model()->findByPk($model->id);
			   echo $org->name;  ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo '<b>Representative:</b>'; ?>
		<?php echo Yii::app()->user->full_name; ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	<br/><br/>
	<?php
/*		echo '<b>eligibility bid</b><br/>';
		echo 'current file: ';
		echo $modele->file_location;
		echo '<br/>';
		echo '<input type="file" name="filee" id="filee" required="required""/><br/>';
*/
		echo '<b>Eligibility Documents</b><br/>';
		if(isset($org->eligibility_doc_file_location)){
			echo '<b>Current File: </b>';
			echo $org->eligibility_doc_file_location;
		echo '<br/>';
		}
		echo '<input accept="application/pdf" type="file" name="filee" id="filee" required="required" /><br/>';
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
