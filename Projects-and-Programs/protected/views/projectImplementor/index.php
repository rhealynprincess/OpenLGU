<?php
/* @var $this ProjectImplementorController */
/* @var $dataProvider CActiveDataProvider */


if(Yii::app()->user->getState("user_role")=='admin'){

	$this->widget('zii.widgets.CBreadcrumbs', array (

'homeLink'=>CHtml::link('Home', array('Admin/index')),
'links' => array(
			"Projects and Programs",
		),
));

	$this->menu=array(
	array('label'=>'Add Project/Program', 'url'=>array('create')),
	array('label'=>'Manage Project/Program', 'url'=>array('admin')),
	array('label'=>'View Reports', 'url'=>array('report/index')),
	//array('label'=>'Edit account', 'url'=>array('admin/update', 'id'=>Yii::app()->user->name)),
);

}

else{
$this->menu=array(
	array('label'=>'Add Project/Program', 'url'=>array('create')),
	//array('label'=>'Manage Project/Program', 'url'=>array('admin')),
	array('label'=>'View Reports', 'url'=>array('report/index')),
	//array('label'=>'Edit account', 'url'=>array('admin/update', 'id'=>Yii::app()->user->name)),
);}
?>

<!--Total number of Projects and Programs by sector from [DATE] to [DATE]-->
<div id="counter">
<table id='counter_table'>
<?php		
		if(Yii::app()->user->getState("user_sector")=="Office of the Mayor"||Yii::app()->user->getState("user_role")=="admin"){
	echo "<th colspan=5>";	
		echo "Total number of projects and programs(All Sectors): ";

		
		$criteria=new CDbCriteria();
		$criteria=new CDbCriteria();
    $count=ProjectImplementor::model()->count($criteria);
		echo $count;
	echo "</th>";

}
	else{
		echo "<th colspan=5>";
		echo "Total number of projects and programs(".Yii::app()->user->getState("user_sector")."): ";
		$criteria=new CDbCriteria();
		$criteria->addInCondition('sector', array(Yii::app()->user->getState("user_sector")));
    $count=ProjectImplementor::model()->count($criteria);
		echo $count;
		echo "</th>";
		}
?>


<?php
	echo "<tr><td>";
	echo " Number of projects started from:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>";
	echo "<td>";
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name' => 'date_started_start',
    'model' => ProjectImplementor::model(),
    'attribute' => 'date_started',
		'options'=>array(
				'onSelect'=>"js:function(dateText,inst){	
			var dateFormat = $('#date_started_end').datepicker('getDate');
        		var end = $.datepicker.formatDate('yy-mm-dd', new Date(dateFormat));					
						".		
			
				 CHtml::ajax(array('type'=>'POST','datatype'=>'html','url'=>array('Report/updatestartstart'), 
                            'data'=>array('selDate'=>'js: dateText', 'end'=>'js: end'),
                               'success'=>'function(html){
                    
                                       document.getElementById("projects_started").innerHTML = html;
                                        return false; }',)
                                ).

					"}",
			
			),
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
));
	echo "</td>";
	echo "<td>";
	echo "to";
	echo "</td>";
	echo "<td>";
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name' => 'date_started_end',
    'model' => ProjectImplementor::model(),
    'attribute' => 'date_started',
		'options'=>array(
				'onSelect'=>"js:function(dateText,inst){		
			
				var dateFormat = $('#date_started_start').datepicker('getDate');
        		var start = $.datepicker.formatDate('yy-mm-dd', new Date(dateFormat));					
						".		
			
				 CHtml::ajax(array('type'=>'POST','datatype'=>'html','url'=>array('Report/updatestartend'), 
                            'data'=>array('selDate'=>'js: dateText', 'start'=>'js: start'),
                               'success'=>'function(html){
                    
                                       document.getElementById("projects_started").innerHTML = html;
                                        return false; }',)
                                ).

					"}",
			
			),
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
));
	echo "</td>";
	echo "<td id='projects_started' >";
	echo "0";
	echo "</td>";

echo "</tr>";
?>

<?php
//completed	
	echo "<tr><td>";
	echo " Number of projects completed from: </td>";
	echo "<td>";
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name' => 'date_completed_start',
    'model' => ProjectImplementor::model(),
    'attribute' => 'date_completed',
		'options'=>array(
				'onSelect'=>"js:function(dateText,inst){
						

						var dateFormat = $('#date_completed_end').datepicker('getDate');
        		var end = $.datepicker.formatDate('yy-mm-dd', new Date(dateFormat));					
						".		
			
				 CHtml::ajax(array('type'=>'POST','datatype'=>'html','url'=>array('Report/updatecompletestart'), 
                            'data'=>array('selDate'=>'js: dateText', 'end'=>'js: end'),
                               'success'=>'function(html){
                    
                                       document.getElementById("projects_completed").innerHTML = html;
                                        return false; }',)
                                ).

					"}",
			
			),
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
));
	echo "</td>";
	echo "<td>";
	echo "to";
	echo "</td>";

?>
<?php
	echo "<td>";
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name' => 'date_completed_end',
    'model' => ProjectImplementor::model(),
    'attribute' => 'date_completed',
		'options'=>array(
				'onSelect'=>"js:function(dateText,inst){
						

						var dateFormat = $('#date_completed_start').datepicker('getDate');
        		var start = $.datepicker.formatDate('yy-mm-dd', new Date(dateFormat));					
						".		
			
				 CHtml::ajax(array('type'=>'POST','datatype'=>'html','url'=>array('Report/updatecompleteend'), 
                            'data'=>array('selDate'=>'js: dateText', 'start'=>'js: start'),
                               'success'=>'function(html){
                    
                                       document.getElementById("projects_completed").innerHTML = html;
                                        return false; }',)
                                ).

					"}",
			
			),
    'htmlOptions' => array(
        'size' => '10',         // textField size
        'maxlength' => '10',    // textField maxlength
    ),
));

	echo "</td>";
	echo "<td id='projects_completed'>";
	echo "0";
	echo "</td>";
?>
</table>
</div>


<h1>Project and Programs</h1>
<?php if(Yii::app()->user->getState("user_role")=='project implementor')echo "<b>".Yii::app()->user->getState("user_sector")."</b>"?>
<!--<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>-->
<?php 
if(Yii::app()->user->getState("user_role")=='project implementor'){
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'project-program-grid',

	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*array(
		'name'=>'project_program_no',
		'header'=> Yii::t('app', 'Project/Program No')),*/
		array(
		'class'=>'CLinkColumn',
		'labelExpression'=>'$data->project_program_title',		
		'urlExpression'=>'Yii::app()->createUrl("projectImplementor/view",array("id"=>$data->project_program_no))',
		'header'=> Yii::t('app', 'Project/Program Title')),
		array (
			'name'=>'cost',
			//'value'=>'Yii::app()->format->formatNumber($data->cost)',
			'value'=>function($data) {
				return number_format($data->cost, 2);
			}
		
		),
		'location',
		//'source_of_fund',
		array(
				'name'=>'date_started',
				'filter'=>CHtml::activeDateField(ProjectImplementor::model(),'date_started', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'date_completed',
				'filter'=>CHtml::activeDateField(ProjectImplementor::model(),'date_completed', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'due_date',
				'filter'=>CHtml::activeDateField(ProjectImplementor::model(),'due_date', array('placeholder'=>'yyyy-mm-dd')),
		),
		'status',
		'contractor',
		'remarks',
		//'sector',
		/*
		array(
			'class'=>'CButtonColumn',
		),*/
	),
)); 
		}
	else{

		$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'project-program-grid',

	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*array(
		'name'=>'project_program_no',
		'header'=> Yii::t('app', 'Project/Program No')),*/
		array(
		'class'=>'CLinkColumn',
		'labelExpression'=>'$data->project_program_title',		
		'urlExpression'=>'Yii::app()->createUrl("projectImplementor/view",array("id"=>$data->project_program_no))',
		'header'=> Yii::t('app', 'Project/Program Title')),
		array (
			'name'=>'cost',
			//'value'=>'Yii::app()->format->formatNumber($data->cost)',
			'value'=>function($data) {
				return number_format($data->cost, 2);
			}
		),
		'location',
		//'source_of_fund',
		array(
				'name'=>'date_started',
				'filter'=>CHtml::activeDateField(ProjectImplementor::model(),'date_started', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'date_completed',
				'filter'=>CHtml::activeDateField(ProjectImplementor::model(),'date_completed', array('placeholder'=>'yyyy-mm-dd')),
		),
		array(
				'name'=>'due_date',
				'filter'=>CHtml::activeDateField(ProjectImplementor::model(),'due_date', array('placeholder'=>'yyyy-mm-dd')),
		),
		'status',
		'contractor',
		'remarks',
		//'sector',
		/*
		array(
			'class'=>'CButtonColumn',
		),*/
	),
)); 
}
?>
