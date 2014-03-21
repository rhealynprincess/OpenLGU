<?php
/**
 * Model class for Application.
 *
 * @package EmployeeInformationSystem
 * @subpackage Application
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "application".
 *
 * The followings are the available columns in table 'application':
 * @property integer $application_id
 * @property integer $position_id
 * @property integer $employee_id
 * @property integer $hrmo_id
 * @property string $requirement_status
 * @property string $psb_status
 * @property string $psb_details
 * @property integer $psb_attachment
 * @property string $hrmo_status
 * @property string $application_date
 * @property string $screen_date
 * @property string $approve_date
 * @property string $attachment
 *
 * The followings are the available model relations:
 * @property Employee $employee
 * @property Employee $hrmo
 * @property Position $position
 */
class Application extends CActiveRecord
{
    private $_fullName = null;
    private $_hrmoName = null;
    private $_positionTitle = null;
    private $_currentPosition = null;
    private $_attachments = null;
    
    /**
     * get and set constructors for retrieving full name of Employee.
     * @return string full name of Employee
     */
    public function getFullName()
    {
        if ($this->_fullName === null && $this->employee !== null) {
            $this->_fullName = $this->employee->fullName;
        }
        return $this->_fullName;
    }
    public function setFullName($value)
    {
        $this->_fullName = $value;
    }
    
    /**
     * get and set constructors for retrieving full name of HRMO.
     * @return string full name of HRMO
     */
    public function getHrmoName()
    {
        if ($this->_hrmoName === null && $this->hrmo !== null) {
            $this->_hrmoName = $this->hrmo->fullName;
        }
        return $this->_hrmoName;
    }
    public function setHrmoName($value)
    {
        $this->_hrmoName = $value;
    }
    
    /**
     * get and set constructors for retrieving title of Position.
     * @return string title of Position
     */
    public function getPositionTitle()
    {
        if ($this->_positionTitle === null && $this->position !== null) {
            $this->_positionTitle = $this->position->title;
        }
        return $this->_positionTitle;
    }
    public function setPositionTitle($value)
    {
        $this->_positionTitle = $value;
    }
    
    /**
     * get and set constructors for retrieving title of current Position.
     * @return string title of current Position
     */
    public function getCurrentPosition()
    {
        if ($this->_currentPosition === null && $this->employee->position !== null) {
            $this->_currentPosition = $this->employee->position->title;
        }
        return $this->_currentPosition;
    }
    public function setCurrentPosition($value)
    {
        $this->_currentPosition = $value;
    }
    
    /**
     * get and set constructors for retrieving attachments of Application.
     * @return string attachments of Application
     */
    public function getAttachments()
    {
        return $this->_attachments;
    }
    public function setAttachments($value)
    {
        $this->_attachments = $value;
    }
    
    /**
     * Converts the string of attachment information into array
     */
    public function prepareAttachments() {
        $attachments = explode(';', $this->attachment);
        foreach ($attachments as &$data) {
            $data = explode(',', $data);
        }
        $this->attachments = $attachments;
    }
    
    /**
     * Retrieves the pending Application of an Employee.
     * @return CActiveDataProvider current Application
     */
    public function getMyPendingApplication()
    {
        $application = Application::model()->findAll(array(
            'condition'=>"employee_id = " . Yii::app()->user->getId() . " AND
                requirement_status != 'REJECTED' AND
                psb_status != 'REJECTED' AND
                hrmo_status != 'REJECTED'"
        ));
        
        return end($application);
    }
    
    /**
     * Rejects the other Applications for a Position.
     */
    public function rejectOtherApplications()
    {
        $applications = Application::model()->findAll(array(
            'condition'=>"application_id != $this->application_id AND
                position_id = $this->position_id AND
                hrmo_status = 'PENDING'"
        ));
        
        foreach ($applications as $application) {
            $application->hrmo_status = 'REJECTED';
            $application->save();
        }
    }
    
    /**
     * Retrieves all pending Applications of a Position that are not rejected by the requirements and the PSB.
     * @params integer ID of the open Position and null to return all Positions
     * @return CActiveDataProvider list of Applications
     */
    public function getPendingApplications($id)
    {
        $filter = ($id) ? "AND t.position_id = $id" : null;
        return new CActiveDataProvider($this, array(
            'criteria'=>array(
                'order'=>'application_date',
                'with'=>array('employee.usr', 'position'),
                'condition'=>"requirement_status != 'REJECTED' AND
                    psb_status != 'REJECTED' AND
                    hrmo_status = 'PENDING' $filter",
            )
        ));
    }
    
    /**
     * Creates a flash message containing the screening date of the PSB when an application is approved.
     */
    public function getApplicationNotice()
    {
        $application = Application::model()->findAll(array(
                'condition'=>"t.employee_id = " . Yii::app()->user->getId() . " AND
                    requirement_status = 'APPROVED' AND 
                    screen_date IS NOT NULL AND
                    psb_status = 'PENDING' AND 
                    extract(month FROM application_date) = " . date('m'),
                'with'=>'position',
        ));
        
        if ($application) {
            foreach ($application as $row=>$data) {
                echo Yii::app()->user->setFlash("notice a-$row",
                    "Your application for {$data->position->title} has been approved. 
                    You will undergo Personnel Selection Board screening on "
                    . date('m/d/Y', strtotime($data->screen_date))
                );
            }
        }
    }
    
    /**
     * Retrieves all Documents belonging to this Employee.
     * @return listData list of Documents
     */
    public function getDocuments()
    {
        $id = ($this->employee_id) ? $this->employee_id : Yii::app()->user->getId();
        
        return CHtml::listData(
            Document::model()->findAll(array(
                'condition'=>"owner_id = $id",
                'order'=>'filename'
            )),
            'document_id',
            'filename'
        );
    }
    
    /**
     * Retrieves all Documents belonging to the PSB Chairperson.
     * @return listData list of Documents
     */
    public function getPSBAttachments()
    {
        $id = Yii::app()->user->getId();
        
        return CHtml::listData(
            Document::model()->findAll(array(
                'condition'=>"owner_id = $id",
                'order'=>'filename'
            )),
            'document_id',
            'filename'
        );
    }
    
    /**
     * Check if the current user is the PSB Chairperson.
     * @return integer number of Chairpersons
     */
    public function checkChair()
    {
        $psb = PersonnelSelectionBoard::model()->findByAttributes(array('chair_id'=>Yii::app()->user->getId()));
        return count($psb);
    }
    
    /**
     * Attaches AuditTrail logging to the current model.
     * @return array AuditTrail behavior
     */
    public function behaviors() 
    {
        return array(
            'LoggableBehavior'=>'application.modules.auditTrail.behaviors.LoggableBehavior',
        ); 
    }
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Application the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'application';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee_id, hrmo_id', 'numerical', 'integerOnly'=>true),
            array('screen_date', 'required', 'on'=>'schedule'),
            array('position_id, employee_id, hrmo_id, requirement_status, psb_status, psb_details, psb_attachment,
                  hrmo_status, application_date, screen_date, approve_date', 'safe'), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('application_id, position_id, employee_id, hrmo_id, requirement_status, psb_status,
                  psb_details, psb_attachment, hrmo_status, application_date, screen_date, approve_date,
                  fullName, hrmoName, positionTitle', 'safe', 'on'=>'search'), 
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employee'=>array(self::BELONGS_TO, 'Employee', 'employee_id'), 
            'hrmo'=>array(self::BELONGS_TO, 'Employee', 'hrmo_id'), 
            'position'=>array(self::BELONGS_TO, 'Position', 'position_id'), 
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'application_id'=>'Application ID', 
            'position_id'=>'Position ID', 
            'employee_id'=>'Employee ID', 
            'hrmo_id'=>'HRMO ID', 
            'requirement_status'=>'Requirements', 
            'psb_status'=>'PSB Status', 
            'psb_details'=>'PSB Details', 
            'psb_attachment'=>'PSB Attachment', 
            'hrmo_status'=>'HRMO Status', 
            'application_date'=>'Application Date', 
            'screen_date'=>'Screen Date', 
            'approve_date'=>'Approve Date', 
            'attachment'=>'Attachment', 
            'positionTitle'=>'Vacant Position',
            'hrmoName'=>'HRMO Name',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('employee.usr', 'hrmo.usr'=>array('alias'=>'usr1'), 'position');

        $criteria->compare('application_id::VARCHAR', $this->application_id);
        $criteria->compare('t.position_id::VARCHAR', $this->position_id);
        $criteria->compare('t.employee_id::VARCHAR', $this->employee_id);
        $criteria->compare('t.hrmo_id::VARCHAR', $this->hrmo_id);
        $criteria->compare('LOWER(requirement_status)', $this->requirement_status, true);
        $criteria->compare('LOWER(psb_status)', $this->psb_status, true);
        $criteria->compare('LOWER(psb_details)', $this->psb_details, true);
        $criteria->compare('LOWER(hrmo_status)', $this->hrmo_status, true);
        $criteria->compare('application_date::VARCHAR', $this->application_date, true);
        $criteria->compare('screen_date::VARCHAR', $this->screen_date, true);
        $criteria->compare('approve_date::VARCHAR', $this->approve_date, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare("LOWER(usr1.first_name || ' ' || usr1.middle_name || ' ' || usr1.last_name)",
                           $this->hrmoName, true);
        $criteria->compare('LOWER(position.title)', $this->positionTitle, true);

        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'application_id'=>array(
                'asc'=>'application_id',
                'desc'=>'application_id desc',
            ),
            'fullName'=>array(
                'asc'=>'usr.last_name',
                'desc'=>'usr.last_name desc',
            ),
            'positionTitle'=>array(
                'asc'=>'position.title',
                'desc'=>'position.title desc',
            ),
            'application_date'=>array(
                'asc'=>'application_date',
                'desc'=>'application_date desc',
            ),
            'hrmo_status'=>array(
                'asc'=>'hrmo_status',
                'desc'=>'hrmo_status desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}