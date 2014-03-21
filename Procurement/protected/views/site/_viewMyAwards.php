
<div class="myInv">
<?php
echo CHtml::link(CHtml::encode(substr($data->title,0,60).'...'), array('invitation/view','id'=>$data->id));
 		
?>
</div>