<?php
/**
 * User Menu sidebar.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
$action = Yii::app()->controller->action->getId();
$controller = Yii::app()->controller->getId();

echo "<ul class='operations'>";
if ($controller === 'head' || 
    ($action === 'request' && in_array($controller, array('overtime', 'transfer')))) {
    echo '<li>' . CHtml::link('Home', array('/head')) . '</li>';
    echo '<li>' . CHtml::link('Performance Evaluation', array('/head/evaluation')) . '</li>';
    echo "<ul><li class='title'>Orders</li>";
        echo '<li>' . CHtml::link('Issue Overtime', array('/overtime/request')) . '</li>';
        echo '<li>' . CHtml::link('Issue Transfer', array('/transfer/request')) . '</li>';
    echo '</ul>';
    echo "<ul><li class='title'>Requests</li>";
        echo '<li>' . CHtml::link(
            'Pending Leaves (' . Leave::model()->getPendingLeaves()->itemCount . ')',
            array('/head/leave')
        ) . '</li>';
        echo '<li>' . CHtml::link(
            'Pending Overtimes (' . Overtime::model()->getPendingOvertimes()->itemCount . ')',
            array('/head/overtime')
        ) . '</li>';
        echo '<li>' . CHtml::link(
            'Pending Resignations (' . Resign::model()->getPendingHeadResignations()->itemCount . ')',
            array('/head/resign')
        ) . '</li>';
    echo '</ul>';
}
else if ($controller === 'hrmo' || (isset($_GET['id']) && Yii::app()->user->checkAccess('HRMO'))) {
    echo '<li>' . CHtml::link('Home', array('/hrmo')) . '</li>';
    echo '<li>' . CHtml::link('Department Overview', array('/hrmo/department')) . '</li>';
    echo '<li>' . CHtml::link('Employee Overview', array('/hrmo/employee')) . '</li>';
    echo '<li>' . CHtml::link('Position Overview', array('/hrmo/position')) . '</li>';
    echo '<li>' . CHtml::link('Performance Evaluation', array('/hrmo/evaluation')) . '</li>';
    echo "<ul><li class='title'>Requests</li>";
        echo '<li>' . CHtml::link(
            'Pending Applications (' . Application::model()->getPendingApplications(null)->itemCount . ')',
            array('/hrmo/application')
        ) . '</li>';
        echo '<li>' . CHtml::link(
            'Pending Resignations (' . Resign::model()->getPendingHrmoResignations()->itemCount . ')',
            array('/hrmo/resign')
        ) . '</li>';
    echo '</ul>';
}
else if (in_array($action, array('index', 'psb', 'update'))) {
    echo '<li>' . CHtml::link('Home', array('/admin')) . '</li>';
    echo '<li>' . CHtml::link('Audit Trail', array('/auditTrail/admin')) . '</li>';
    echo '<li>' . CHtml::link('Personnel Selection Board', array('/admin/psb')) . '</li>';
    echo "<ul><li class='title'>Assets</li>";
        echo '<li>' . CHtml::link('Manage Calendar', array('/calendar')) . '</li>';
        echo '<li>' . CHtml::link('Manage Departments', array('/department')) . '</li>';
        echo '<li>' . CHtml::link('Manage Documents', array('/document')) . '</li>';
        echo '<li>' . CHtml::link('Manage Employees', array('/employee')) . '</li>';
        echo '<li>' . CHtml::link('Manage Positions', array('/position')) . '</li>';
        echo '<li>' . CHtml::link('Manage Users', array('/user')) . '</li>';
    echo '</ul>';

    echo "<ul><li class='title'>Requests</li>";
        echo '<li>' . CHtml::link('Manage Applications', array('/application')) . '</li>';
        echo '<li>' . CHtml::link('Manage Evaluations', array('/evaluation')) . '</li>';
        echo '<li>' . CHtml::link('Manage Leaves', array('/leave')) . '</li>';
        echo '<li>' . CHtml::link('Manage Overtimes', array('/overtime')) . '</li>';
        echo '<li>' . CHtml::link('Manage Resignations', array('/resign')) . '</li>';
        echo '<li>' . CHtml::link('Manage Transfers', array('/transfer')) . '</li>';
    echo '</ul>';
}
else {
    if ($controller === 'employee' && isset($_GET['id']) && Yii::app()->user->checkAccess('ADMIN')) {
        echo '<li>' . CHtml::link('Manage Employees', array('/employee')) . '</li>';
    }
    else {
        echo '<li>' . CHtml::link('Profile', array('/site/profile')) . '</li>';
        echo '<li>' . CHtml::link('Employee Information', array('/employee/view')) . '</li>';
        echo '<li>' . CHtml::link('My Documents', array('/document/view')) . '</li>';
        if (!Yii::app()->user->checkAccess('APPLICANT')) {
            echo '<li>' . CHtml::link('Performance Evaluation', array('/evaluation/upload')) . '</li>';
            echo '<li>' . CHtml::link('Leave of Absence', array('/leave/request')) . '</li>';
            echo '<li>' . CHtml::link('Resignation', array('/resign/request')) . '</li>';
        }
        echo '<li>' . CHtml::link('Account Settings', array('/user/account')) . '</li>';
    }
}
echo '</ul>';