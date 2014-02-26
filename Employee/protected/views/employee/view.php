<?php
/**
 * Employee Information which categorizes information in tabs.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this EmployeeController */
/* @var $model Employee */

$this->pageTitle = Yii::app()->name . ' - Employee Information';
if (isset($_GET['id'])) {
    if (Yii::app()->user->checkAccess('ADMIN')) {
        $this->breadcrumbs = array(
            'Admin'=>array('/admin'), 
            'Employees'=>array('/employee'), 
            'Employee Information'
        );
    }
    else if (Yii::app()->user->checkAccess('HRMO')) {
        $this->breadcrumbs = array(
            'Human Resource Management Officer'=>array('/hrmo'), 
            'Employee Information'
        );
    }
}
else {
    $this->breadcrumbs=array(
        'Profile'=>array('site/profile'), 
        'Employee Information'
    );
}

$user = User::model()->findByPk($id);
$model = $this->loadModel($id);

Yii::app()->clientScript->registerScript(uniqid(), "
    if ('" . !isset($_GET['id']) . "') {
        $('#mainmenu ul li a[href$=profile]').parent().addClass('active');
    }
    else {
        if ('" . Yii::app()->user->checkAccess('ADMIN') . "') {
            $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
        }
        else if ('" . Yii::app()->user->checkAccess('HRMO') . "') {
            $('#mainmenu ul li a[href*=hrmo]').parent().addClass('active');
        }
    }
");

echo "<h1>$user->last_name, $user->first_name $user->middle_name</h1>";

$tabs = array(
    'Personal'=>array(
        'id'=>'Personal-Information', 
        'content'=>$this->renderPartial('_personal', array('id'=>$id), true)
    ), 
    'Family'=>array(
        'id'=>'Family-Background', 
        'content'=>$this->renderPartial('_family', array('id'=>$id), true)
    ), 
    'Education'=>array(
        'id'=>'Educational-Background', 
        'content'=>$this->renderPartial('_education', array('id'=>$id), true)
    ), 
    'Civil Service Eligibility'=>array(
        'id'=>'Civil-Service-Eligibility', 
        'content'=>$this->renderPartial('_cse', array('id'=>$id), true)
    ), 
    'Work'=>array(
        'id'=>'Work-Experience', 
        'content'=>$this->renderPartial('_work', array('id'=>$id), true)
    ), 
    'Voluntary Work'=>array(
        'id'=>'Voluntary-Work', 
        'content'=>$this->renderPartial('_volwork', array('id'=>$id), true)
    ), 
    'Training'=>array(
        'id'=>'Training-Programs', 
        'content'=>$this->renderPartial('_training', array('id'=>$id), true)
    ), 
    'Other'=>array(
        'id'=>'Other-Information', 
        'content'=>$this->renderPartial('_other', array('id'=>$id), true)
    ), 
);
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>$tabs, 
    'options'=>array(
        'cache'=>true, 
        'selected'=>(isset($_GET['cat'])) ? $_GET['cat'] : 0, 
    ), 
));