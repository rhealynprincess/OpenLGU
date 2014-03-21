<?php
/**
 * Position Overview page to list all detailed information on Positions in the LGU.
 *
 * @package EmployeeInformationSystem
 * @subpackage HRMO
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this HrmoController */

$this->pageTitle = Yii::app()->name . ' - Position Overview';
$this->breadcrumbs=array(
    'Human Resource Management Officer'=>array('/hrmo'),
    'Position Overview',
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
        $.fn.yiiGridView.update('position-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Position Overview</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
echo CHtml::button('Advanced Search', array('class'=>'search'));
echo '<div class="search-form" style="display:none">';
$this->renderPartial('../position/_search', array(
    'model'=>$model,
));
echo '</div><!-- search-form -->';

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'position-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'position_id',
        'departmentName',
        'title',
        'role',
        'fullName',
        array(
            'name'=>'appoint_date',
            'value'=>'($data->appoint_date) ? date("m/d/Y", strtotime($data->appoint_date)) : null',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createUrl("position/view", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#position-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "View Position");
                            $(this).dialog("open");
                        });
                        return false;
                    }'
                ),
            ),
        ),
    ),
));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'position-dialog',
    'options'=>array(
        'autoOpen'=>false,
        'modal'=>true,
        'resizable'=>false,
        'width'=>550,
        'show'=>'clip',
        'hide'=>'clip',
    ),
));
$this->endWidget();
?>