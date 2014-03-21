<?php
/**
 * Employee Personal information tab.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
if (!isset($_GET['id']) || Yii::app()->user->checkAccess('ADMIN')) {
    echo CHtml::ajaxButton('Update', Yii::app()->createUrl('/employee/update', array('id'=>$id, 'cat'=>'0')),
        array('success'=>'function(data){
            $("#personal-dialog").html(data).dialog("open")
        }'),
        array('class'=>'css-button')
    );
    echo '<br><br>';
}

$user = User::model()->findByPk($id);
$model = Employee::model()->findByPk($id);

$this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'cs_id',
        array(
            'name'=>'birthday',
            'value'=>($model->birthday) ? date('m/d/Y', strtotime($model->birthday)) : null,
        ),
        'birthplace',
        'sex',
        'civil_status',
        'citizenship',
        'height',
        'weight',
        'blood_type',
        'gsis_id',
        'pagibig_id',
        'philhealth_id',
        'sss_id',
        'residential_address',
        'residential_zip',
        'residential_tel_no',
        'permanent_address',
        'permanent_zip',
        'permanent_tel_no',
        array(
            'name'=>'email',
            'value'=>$user->email,
        ),
        'cellphone_no',
        'agency_emp_no',
        'tin',
    ),
    'nullDisplay'=>'',
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'personal-dialog',
    'options'=>array(
        'title'=>'I. Personal Information',
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>500,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();