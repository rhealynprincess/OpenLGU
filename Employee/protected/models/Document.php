<?php
/**
 * Model class for Document.
 *
 * @package EmployeeInformationSystem
 * @subpackage Document
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $document_id
 * @property integer $owner_id
 * @property string $details
 * @property string $filename
 * @property string $last_modified
 *
 * The followings are the available model relations:
 * @property Employee $owner
 */
class Document extends CActiveRecord
{
    private $_oldName = null;
    public $newName = null;
    private $_fullName = null;
    
    /**
     * get and set constructors for retrieving full name of Document owner.
     * @return string full name of Document owner
     */
    public function getFullName()
    {
        if ($this->_fullName === null && $this->owner !== null) {
            $this->_fullName = $this->owner->fullName;
        }
        return $this->_fullName;
    }
    public function setFullName($value)
    {
        $this->_fullName = $value;
    }
    
    /**
     * get and set constructors for retrieving old name of Document.
     * @return string old name of Document
     */
    public function getOldName()
    {
        if ($this->_oldName === null && $this->filename !== null) {
            $this->_oldName = $this->filename;
        }
        return $this->_oldName;
    }
    public function setOldName($value)
    {
        $this->_oldName = $value;
    }
    
    /**
     * Retrieves all Documents belonging to current User.
     * @return CActiveDataProvider list of Documents
     */
    public function getDocuments()
    {
        return new CActiveDataProvider($this,array(
            'criteria'=>array(
                'order'=>'last_modified',
                'condition'=>"owner_id = " . Yii::app()->user->getId(),
            )
        ));
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
     * @return Document the static model class
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
        return 'document';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('owner_id', 'numerical', 'integerOnly'=>true),
            array('filename', 'file', 'types'=>'doc, docx, jpg, jpeg, pdf, rar, zip', 'maxSize'=>1024*1024*2),
            array('newName', 'compare', 'compareAttribute'=>'oldName', 'on'=>'update'),
            array('filename, details', 'required'),
            array('filename', 'unique', 'criteria'=>array('condition'=>'owner_id = ' . Yii::app()->user->getId())),
            array('details, filename, last_modified, newName, oldName', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('document_id, owner_id, details, filename, last_modified, fullName', 'safe', 'on'=>'search'),
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
            'owner'=>array(self::BELONGS_TO, 'Employee', 'owner_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'document_id'=>'Document ID',
            'owner_id'=>'Owner ID',
            'details'=>'Details',
            'filename'=>'File',
            'last_modified'=>'Last Modified',
            'fullName'=>'Owner',
            'oldName'=>'Original File',
            'newName'=>'File',
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
        $criteria->with = array('owner.usr');

        $criteria->compare('document_id::VARCHAR', $this->document_id);
        $criteria->compare('owner_id::VARCHAR', $this->owner_id);
        $criteria->compare('LOWER(details)', $this->details, true);
        $criteria->compare('LOWER(filename)', $this->filename, true);
        $criteria->compare('last_modified::VARCHAR', $this->last_modified, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare('LOWER(filename)', $this->oldName, true);

        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'document_id'=>array(
                'asc'=>'document_id',
                'desc'=>'document_id desc',
            ),
            'oldName'=>array(
                'asc'=>'filename',
                'desc'=>'filename desc',
            ),
            'fullName'=>array(
                'asc'=>'usr.last_name',
                'desc'=>'usr.last_name desc',
            ),
            'details'=>array(
                'asc'=>'details',
                'desc'=>'details desc',
            ),
            'last_modified'=>array(
                'asc'=>'last_modified',
                'desc'=>'last_modified desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}