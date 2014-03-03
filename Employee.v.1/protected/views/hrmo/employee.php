<?php
/**
 * Employee Overview page to list detailed information on all Employees in the LGU.
 *
 * @package EmployeeInformationSystem
 * @subpackage HRMO
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HrmoController */

$this->pageTitle = Yii::app()->name . ' - Employee Overview';
$this->breadcrumbs=array(
    'Human Resource Management Officer'=>array('/hrmo'),
    'Employee Overview',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=hrmo]').parent().addClass('active');
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

<h1>Employee Overview</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
echo CHtml::button('Advanced Search', array('class'=>'search'));
echo '<div class="search-form" style="display:none">';
$this->renderPartial('../employee/_search', array(
	'model'=>$model,
));
echo '</div><!-- search-form -->';

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'fullName',
        'departmentName',
        'positionTitle',
        'rank',
        'salary',
        'role',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createUrl("employee/view", array("id"=>$data->primaryKey))',
                ),
            ),
		),
	),
));
?>