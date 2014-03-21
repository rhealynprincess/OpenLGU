<?php
/* @var $this DocumentController */
/* @var $data Document */
?>

<div class="view">

<?php
	echo CHtml::link(CHtml::encode($data->getAttributeLabel('barangay_clearance')), Yii::app()->baseUrl . $data->file_path . $data->barangay_clearance);
?>
<?php if($data->barangay_status == 'PENDING'){?>
<b style="float:right; color:red"><?php echo CHtml::encode($data->barangay_status); ?></b>
<?php }?>
<?php if($data->barangay_status == 'INVALID'){?>
<b style="float:right; color:violet"><?php echo CHtml::encode($data->barangay_status); ?></b>
<?php }?>
<?php if($data->barangay_status == 'APPROVED'){?>
<b style="float:right; color:green"><?php echo CHtml::encode($data->barangay_status); ?></b>
<?php }?>

<br/><br/>

<?php
	echo CHtml::link(CHtml::encode($data->getAttributeLabel('zoning_clearance')), Yii::app()->baseUrl . $data->file_path . $data->zoning_clearance);
?>
<?php if($data->zoning_status == 'PENDING'){?>
<b style="float:right; color:red"><?php echo CHtml::encode($data->zoning_status); ?></b>
<?php }?>
<?php if($data->zoning_status == 'INVALID'){?>
<b style="float:right; color:violet"><?php echo CHtml::encode($data->zoning_status); ?></b>
<?php }?>
<?php if($data->zoning_status == 'APPROVED'){?>
<b style="float:right; color:green"><?php echo CHtml::encode($data->zoning_status); ?></b>
<?php }?>

<br/><br/>

<?php
	echo CHtml::link(CHtml::encode($data->getAttributeLabel('sanitary_clearance')), Yii::app()->baseUrl . $data->file_path . $data->sanitary_clearance);
?>
<?php if($data->sanitary_status == 'PENDING'){?>
<b style="float:right; color:red"><?php echo CHtml::encode($data->sanitary_status); ?></b>
<?php }?>
<?php if($data->sanitary_status == 'INVALID'){?>
<b style="float:right; color:violet"><?php echo CHtml::encode($data->sanitary_status); ?></b>
<?php }?>
<?php if($data->sanitary_status == 'APPROVED'){?>
<b style="float:right; color:green"><?php echo CHtml::encode($data->sanitary_status); ?></b>
<?php }?>

<br/><br/>

<?php
	echo CHtml::link(CHtml::encode($data->getAttributeLabel('occupancy_permit')), Yii::app()->baseUrl . $data->file_path . $data->occupancy_permit);
?>
<?php if($data->occupancy_status == 'PENDING'){?>
<b style="float:right; color:red"><?php echo CHtml::encode($data->occupancy_status); ?></b>
<?php }?>
<?php if($data->occupancy_status == 'INVALID'){?>
<b style="float:right; color:violet"><?php echo CHtml::encode($data->occupancy_status); ?></b>
<?php }?>
<?php if($data->occupancy_status == 'APPROVED'){?>
<b style="float:right; color:green"><?php echo CHtml::encode($data->occupancy_status); ?></b>
<?php }?>

<br/><br/>

<?php
	echo CHtml::link(CHtml::encode($data->getAttributeLabel('fire_safety')), Yii::app()->baseUrl . $data->file_path . $data->fire_safety);
?>
<?php if($data->fire_safety_status == 'PENDING'){?>
<b style="float:right; color:red"><?php echo CHtml::encode($data->fire_safety_status); ?></b>
<?php }?>
<?php if($data->fire_safety_status == 'INVALID'){?>
<b style="float:right; color:violet"><?php echo CHtml::encode($data->fire_safety_status); ?></b>
<?php }?>
<?php if($data->fire_safety_status == 'APPROVED'){?>
<b style="float:right; color:green"><?php echo CHtml::encode($data->fire_safety_status); ?></b>
<?php }?>

</div>
