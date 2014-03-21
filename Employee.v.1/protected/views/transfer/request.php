<?php
/**
 * Issue Transfer page for Department Heads.
 *
 * @package EmployeeInformationSystem
 * @subpackage Transfer
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this TransferController */
/* @var $model Transfer */

$this->pageTitle = Yii::app()->name . ' - Issue Transfer';

$this->breadcrumbs = array(
    'Department Head'=>array('/head'),
    'Issue Transfer',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=head]').parent().addClass('active');
");
?>

<h1>Issue Transfer Order</h1>
<p>
You may only transfer an employee to a position of equivalent rank, level or salary.
<br>
Please indicate the details of the Transfer, e.g., target location, additional role.
</p>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
    'view'=>$view,
));
?>