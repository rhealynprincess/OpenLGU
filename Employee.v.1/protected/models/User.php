<?php
/**
 * Model class for User.
 *
 * @package EmployeeInformationSystem
 * @subpackage User
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $status
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class User extends CActiveRecord
{
    public $newEmail;
    public $newUsername;
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;
    public $roleList = array(
        'USER'=>'USER',
        'ADMIN'=>'ADMIN',
        'HRMO'=>'HRMO',
        'DEPARTMENT HEAD'=>'DEPARTMENT HEAD',
        'APPLICANT'=>'APPLICANT'
    );
    public $statusList = array(
        'PENDING'=>'PENDING',
        'ACTIVE'=>'ACTIVE',
        'INACTIVE'=>'INACTIVE',
    );
    private $_fullName;
    
    /**
     * get constructor for retrieving full name of Employee.
     * @return string full name of Employee
     */
    public function getFullName()
    {
        return $this->last_name . ', ' . $this->first_name . ' ' . $this->middle_name;
    }
    
    /**
     * Creates a flash message containing a pending User account.
     *
     * An AJAX button is appended to the notice which creates a dialog box containing the details
     * of the User account. The account may be modified to have an Active status.
     */
    public function getPendingAccounts()
    {
        $user = User::model()->findAll(array(
                'condition'=>"status = 'PENDING'",
                'order'=>'create_date',
        ));
        
        if ($user) {
            foreach ($user as $row=>$data) {
                $url =  CHtml::ajaxButton(
                    'View',
                    Yii::app()->createUrl('user/update', array('id'=>$data->user_id)),
                    array('success'=>'function(data){
                        $("#order-dialog").dialog("option", "title", "Pending Account");
                        $("#order-dialog").html(data).dialog("open");
                    }')
                );
                echo Yii::app()->user->setFlash('notice o-' . $row, 'You have a pending Account. ' . $url);
            }
        }
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
     * @return User the static model class
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
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, username, password, oldPassword, newPassword, confirmPassword,
                  first_name, middle_name, last_name', 'length', 'max'=>32),
            //array('newPassword, confirmPassword', 'length', 'min'=>6),
            array('email, username, first_name, middle_name, last_name', 'required'),
            array('newPassword, confirmPassword', 'required', 'on'=>'insert'),
            //array('username, newUsername', 'username'),
	
            array('username, newUsername,', 'unique', 'attributeName'=>'username', 'message'=>'Username has already been taken.'),
            array('confirmPassword', 'compare', 'compareAttribute'=>'newPassword',
                  'on'=>'insert, changePassword', 'message'=>'Passwords must match.'),
            array('user_id, email, username, first_name, middle_name, last_name, role, status, create_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, email, username, first_name, middle_name, last_name, role,
                  status, create_date', 'safe', 'on'=>'search'),
        );
    }

    public function hashPassword($password)
    {
        return md5(md5($password) . Yii::app()->params["salt"]);
    }
    
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employee'=>array(self::HAS_ONE, 'Employee', 'employee_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'user_id'=>'User ID',
            'email'=>'Email',
	    'username'=>'Username',
            'password'=>'Password',
            'newEmail'=>'Change Email',
            'oldPassword'=>'Old Password',
            'newPassword'=>'New Password',
            'confirmPassword'=>'Confirm Password',
            'role'=>'Role',
            'first_name'=>'First Name',
            'middle_name'=>'Middle Name',
            'last_name'=>'Last Name',
            'status'=>'Status',
            'create_date'=>'Date Created',
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

        $criteria->compare('user_id::VARCHAR', $this->user_id);
        $criteria->compare('email', $this->email, true);
	$criteria->compare('username', $this->username, true);
        $criteria->compare('LOWER(role)', $this->role, true);
        $criteria->compare('LOWER(first_name)', $this->first_name, true);
        $criteria->compare('LOWER(middle_name)', $this->middle_name, true);
        $criteria->compare('LOWER(last_name)', $this->last_name, true);
        $criteria->compare('LOWER(status)', $this->status, true);
        $criteria->compare('create_date::VARCHAR', $this->create_date, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
