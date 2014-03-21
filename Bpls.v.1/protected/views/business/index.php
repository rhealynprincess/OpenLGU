<?php
/* @var $this BusinessController */
/* @var $dataProvider CActiveDataProvider */

/* REGISTERED */
if(Yii::app()->user->role == 'REGISTERED')
{
	$this->breadcrumbs=array(
		'My Businesses',
	);
	
	if(!($dataProvider))
	{
		$this->menu=array(
			array('label'=>'Register a Business', 'url'=>array('create', 'id'=>Yii::app()->user->id)),
			array('label'=>'Renew a Business', 'url'=>array('create', 'id'=>Yii::app()->user->id)),
		);
	} else
	{
		$this->menu=array(
			array('label'=>'Register a Business', 'url'=>array('create', 'id'=>Yii::app()->user->id)),

		);
	}
}

/* ADMIN */
elseif(Yii::app()->user->role == 'ADMIN')
{
	$this->breadcrumbs=array(
		'Taxpayers'=>array('taxpayer/admin'),
		$userModel->email=>array('taxpayer/view', 'id'=>$userModel->user_id),
		'Businesses',
	);
	

}



?>

<?php if(Yii::app()->user->role == 'REGISTERED'){ ?>
<h4 style="text-align:center"><b>My Businesses</b></h4>
<?php } ?>

<?php if(Yii::app()->user->role == 'ADMIN'){ ?>
<h4 style="text-align:center"><b><?php echo $userModel->email."'s"; ?> Businesses</b></h4>
<?php } ?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
