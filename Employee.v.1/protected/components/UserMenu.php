<?php
/**
 * User Menu component.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */

Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet
{
    /**
     * Initialize component.
     */
    public function init()
    {
        $this->title = 'Control Panel';
        parent::init();
    }

    /**
     * Render view file.
     */
    protected function renderContent()
    {
        $this->render('userMenu');
    }
}