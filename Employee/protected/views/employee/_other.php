<?php
/**
 * Employee Other information tab.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
if (!isset($_GET['id']) || Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Update', Yii::app()->createUrl('/employee/update', array('id'=>$id, 'cat'=>'7')), 
        array('success'=>'function(data){
            $("#other-dialog").html(data).dialog("open")
        }'), 
        array('class'=>'css-button')
    );
    echo '<br><br>';
}

$model = Employee::model()->findByPk($id);
$this->widget('zii.widgets.CDetailView', array(
    'data'=>$model, 
    'attributes'=>array(
        'skills_hobbies', 
        'non_academic_distinctions', 
        'organizations', 
    ), 
    'nullDisplay'=>'', 
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'other-dialog', 
    'options'=>array(
        'title'=>'VIII. Other Information', 
        'autoOpen'=>false, 
        'modal'=>true, 
        'resizable'=>false, 
        'width'=>550, 
        'show'=>'clip', 
        'hide'=>'clip', 
    ), 
));
$this->endWidget();