
<div class="myInv">
<?php
$inv = Invitation::model()->findByPk($data->invitation_id);
if($inv->status!='active'){
 	echo '<span style="color:red">';
 }
 else{
 	echo '<span>';
 }
echo CHtml::link(CHtml::encode(substr($inv->title,0,60).'...'), array('invitation/view','id'=>$inv->id));
 echo '</span>';
?>
</div>