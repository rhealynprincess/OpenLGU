<?php
/* @var $this InvitationController */
/* @var $model Invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('invitation/index'),
	substr(Invitation::model()->findByPk($model->invitation_id)->title,0,15).'...' => array('invitation/view','id'=>$model->invitation_id) ,
	'Evaluate Bid'
);

$this->menu=array(
	array('label'=>'List Invitation', 'url'=>array('index')),
	array('label'=>'Manage Invitation', 'url'=>array('admin')),
);
?>

<h1>Evaluate Bid</h1>

<?php echo $this->renderPartial('_viewDocuments',array('model'=>$model,'modele'=>$modele,'modelt'=>$modelt,'modelf'=>$modelf)); ?>
