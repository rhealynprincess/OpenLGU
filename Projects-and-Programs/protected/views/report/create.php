<?php
/* @var $this ReportController */
/* @var $model Report */

/*$this->breadcrumbs=array(
	'Reports'=>array('index'),
	'Create',
);
*/

if(Yii::app()->user->getState("user_role")=='admin'){

	$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('Admin/index')),
'links' => array(
			"Reports"=>array('Report/index'),
			"Create",
		),
));
	$this->menu=array(
	array('label'=>'List Reports', 'url'=>array('index')),
	array('label'=>'Manage Report', 'url'=>array('admin')),
);

}


else if(Yii::app()->user->getState("user_role")=='project implementor'){

	$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('projectImplementor/index')),
'links' => array(
			"Reports"=>array('Report/index'),
			"Create",
		),
));
	$this->menu=array(
	array('label'=>'List Reports', 'url'=>array('index')),
	//array('label'=>'Manage Report', 'url'=>array('admin')),
);

}


?>

<h1>Create Report</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
