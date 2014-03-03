<?php
/**
 * Document View page which allows users to upload their documents.
 *
 * @package EmployeeInformationSystem
 * @subpackage Document
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/* @var $this DocumentController */
/* @var $model Document */

$this->pageTitle = Yii::app()->name . ' - My Documents';
$this->breadcrumbs = array(
    'Profile'=>array('site/profile'),
    'My Documents',
);

Yii::app()->clientScript->registerScript(uniqid(), "
    $('#mainmenu ul li a[href$=profile]').parent().addClass('active');
    $('input[id$=filename]').change(function(){
        $('input[id$=newName]').val($(this).val().substring(12));
    });
    $('.upload').click(function(){
        window.location.href = '" . Yii::app()->createUrl('document/view') . "';
    });
    $('.flash-success').animate({opacity: 1.0}, 1000).fadeOut('slow');
");
?>

<h1>My Documents</h1>

<p>
You may compress multiple documents using .rar or .zip format.
<br>
You may upload up to 2MB per file with these extensions: .doc, .docx, .jpg, .jpeg, .pdf, .rar, .zip
</p>

<?php
$this->renderPartial('_form', array(
    'model'=>$model,
));

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'document-grid',
    'dataProvider'=>$model->getDocuments(),
    'template'=>'{items}{pager}',
    'columns'=>array(
        'filename',
        'details',
        array(
            'name'=>'last_modified',
            'value'=>'($data->last_modified) ? date("m/d/Y H:i:s", strtotime($data->last_modified)) : null',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
        ),
    ),
));
?>