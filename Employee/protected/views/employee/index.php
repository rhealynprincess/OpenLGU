<?php
/**
 * Manage Employees index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this EmployeeController */
/* @var $model Employee */

$this->pageTitle = Yii::app()->name . ' - Manage Employees';
$this->breadcrumbs=array(
    'Admin'=>array('/admin'),
	'Employee',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function()
    {
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function()
    {
        $.fn.yiiGridView.update('employee-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Employees</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
echo CHtml::button('Advanced Search', array('class'=>'search'));
echo '<div class="search-form" style="display:none">';
$this->renderPartial('_search', array(
	'model'=>$model,
));
echo '</div><!-- search-form -->';

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'employee_id',
        'fullName',
        'departmentName',
        'positionTitle',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
		),
	),
));
?>