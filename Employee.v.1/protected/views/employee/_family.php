<?php
/**
 * Employee Family information tab.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
if (!isset($_GET['id']) || Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Update', Yii::app()->createUrl('/employee/update', array('id'=>$id, 'cat'=>'1')), 
        array('success'=>'function(data){
            $("#family-dialog").html(data).dialog("open")
        }'), 
        array('class'=>'css-button')
    );
    echo '<br><br>';
}

$model = Employee::model()->findByPk($id);
$spouse = $model->spouse_first_name . ' ' . $model->spouse_middle_name . ' ' . $model->spouse_last_name;
$father = $model->father_first_name . ' ' . $model->father_middle_name . ' ' . $model->father_last_name;
$mother = $model->mother_first_name . ' ' . $model->mother_middle_name . ' ' . $model->mother_last_name;

$user = User::model()->findByPk($model->employee_id);
$this->widget('zii.widgets.CDetailView', array(
    'data'=>$model, 
    'attributes'=>array(
        array(
            'label'=>'Spouse\'s Name', 
            'value'=>$spouse, 
        ), 
        'spouse_occupation', 
        'spouse_employer', 
        'spouse_business_addr', 
        'spouse_tel_no', 
        array(
            'label'=>'Father\'s Name', 
            'value'=>$father, 
        ), 
        array(
            'label'=>'Mother\'s Name', 
            'value'=>$mother, 
        ), 
    ), 
    'nullDisplay'=>'', 
));

$this->renderPartial('_child', array(
    'id'=>$id, 
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'family-dialog', 
    'options'=>array(
        'title'=>'II. Family Background', 
        'autoOpen'=>false, 
        'modal'=>true, 
        'resizable'=>false, 
        'width'=>500, 
        'show'=>'clip', 
        'hide'=>'clip', 
    ), 
));
$this->endWidget();