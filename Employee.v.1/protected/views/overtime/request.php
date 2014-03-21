<?php
/**
 * Overtime Request page for Department Heads to issue overtime orders.
 *
 * @package EmployeeInformationSystem
 * @subpackage Overtime
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this OvertimeController */
/* @var $model Overtime */

$this->pageTitle = Yii::app()->name . ' - Issue Overtime';

$this->breadcrumbs = array(
    'Department Head'=>array('/head'),
    'Issue Overtime',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=head]').parent().addClass('active');
");
?>

<h1>Issue Overtime Order</h1>
<p>
Please select the employees who will receive this Overtime Order.
<br>
You must submit a short summary and Approve this Overtime Order after rendering this activity.
</p>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
    'employees'=>$employees,
));
?>