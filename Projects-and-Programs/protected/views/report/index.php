<?php
/* @var $this ReportController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Reports',
);*/

if(Yii::app()->user->getState("user_role")=="chief executive officer"){
	$this->menu=array(
	array('label'=>'List Projects and Programs', 'url'=>array('mayor/index')),
	);
}
else if(Yii::app()->user->getState("user_role")=='admin'){
	$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('Admin/index')),
'links' => array(
			"Reports",
		),
));
$this->menu=array(
	array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'List Projects and Programs', 'url'=>array('projectImplementor/index')),
);
}


else if(Yii::app()->user->getState("user_role")=='project implementor'){
	$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('projectImplementor/index')),
'links' => array(
			"Reports",
		),
));
$this->menu=array(
	array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'List Projects and Programs', 'url'=>array('projectImplementor/index')),
);
}

?>






<h1>Reports</h1>
<?php


if(Yii::app()->user->getState("user_sector")=="Municipal Planning and Development Office"||Yii::app()->user->getState("user_sector")=="Office of the Mayor"){
		 $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); 
}

else{
	$sect=Yii::app()->user->getState("user_sector");
		$dataProvider=new CActiveDataProvider('Report', array(
			'criteria'=>array(
						'condition'=>"sector='{$sect}'",
			),
		));
		 $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); 

}


?>
