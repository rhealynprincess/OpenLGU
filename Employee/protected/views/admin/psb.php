<?php
/**
 * Personnel Selection Board page.
 *
 * @package EmployeeInformationSystem
 * @subpackage PersonnelSelectionBoard
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this AdminController */
/* @var $model Admin */

$this->pageTitle = Yii::app()->name . ' - Personnel Selection Board';

$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Personnel Selection Board',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
");
?>

<h1>Personnel Selection Board</h1>

<ul>
    <li><b>Chairperson</b> - Agency Head/Local Chief Executve. Responsible for the decision of the PSB.</li>
    <li><b>Department Head</b> - Screens job applications in the same department.</li>
    <li><b>Human Resource Management Officer</b> - Screens all job applications.</li>
    <li><b>Second Level Representative</b> - Screens job applications in the second level.</li>
    <li><b>First Level Representative</b> - Screens job applications in the first level.</li>
</ul>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
));
?>