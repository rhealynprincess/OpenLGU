<?php
/* @var $this AwardingController */
/* @var $data Awarding */
?>

<?php 
$inv = Invitation::model()->findByPk($data->id);
echo '<b>Least Calculated Responsive Bid: </b>';
$org = Organization::model()->findByPk($inv->lcrb);
if(isset($org)){
echo $org->name;
	if($inv->status!='awarded'){
		if(Yii::app()->user->checkAccess('LCE')){
			echo '<span class="awardLink">';
		 	echo CHtml::link(CHtml::encode('Award to LCRB'), array('invitation/awardTo', 'id'=>$org->id, 'inv_id'=>$inv->id));
		 	echo '</span>';
	}
}
}
echo '<br/>';
?>

<?php 
echo '<b>Awarded to: </b>';
$org = Organization::model()->findByPk($inv->awardee);
if(isset($org))
echo $org->name;
		 	
echo '<br/>';
?>

	<?php echo 'Date of Award:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->date_awarded);
	echo '</b>';
	echo '<br />';
	?>

	<?php echo 'Time of Award:'; ?>
	<?php 
	echo '<b>';
	echo CHtml::encode($data->time_awarded);
	echo '</b>';
	echo '<br/>';
	?>
	
	

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />

</div>
