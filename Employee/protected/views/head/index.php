<?php
/**
 * Department Head index page which also lists all Positions under the Department.
 *
 * @package EmployeeInformationSystem
 * @subpackage DepartmentHead
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HeadController */

$this->pageTitle = Yii::app()->name . ' - Department Head';
$this->breadcrumbs = array(
    'Department Head'
);
?>

<h1>Department Head</h1>
<h2>Department Overview of <?php echo $model->name; ?></h2>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'overview-table',
    'dataProvider'=>$model->getPositions(),
    'enableSorting'=>false,
    'template'=>'{items}{pager}',
    'columns'=>array(
        'title',
        'rank',
        'fullName',
        'role',
        'salary',
    ),
));
?>