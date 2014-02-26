<?php
/**
 * Manage Transfers index page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Transfer
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this TransferController */
/* @var $model Transfer */

$this->pageTitle = Yii::app()->name . ' - Manage Transfers';
$this->breadcrumbs = array(
    'Admin'=>array('/admin'),
    'Transfer',
);

Yii::app()->clientScript->registerScript('search', "
    $('#mainmenu ul li a[href*=admin]').parent().addClass('active');
    $('.search').click(function(){
        $('.search-form').toggle('');
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('transfer-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<h1>Manage Transfers</h1>

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
    'id'=>'transfer-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'transfer_id',
        'fullName',
        'headName',
        array(
            'name'=>'request_date',
            'value'=>'($data->request_date) ? date("m/d/Y", strtotime($data->request_date)) : null',
        ),
        array(
            'name'=>'approve_date',
            'value'=>'($data->approve_date) ? date("m/d/Y", strtotime($data->approve_date)) : null',
        ),
        'emp_status',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
            'buttons'=>array(
                'update'=>array(
                    'url'=>'Yii::app()->createUrl("transfer/update", array("id"=>$data->primaryKey))',
                    'click'=>'function(){
                        $("#transfer-dialog").load($(this).attr("href"), function(){
                            $(this).dialog("option", "title", "Update Transfer");
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
    'id'=>'transfer-dialog',
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