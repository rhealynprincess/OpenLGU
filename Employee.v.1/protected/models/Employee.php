<?php
/**
 * Model class for Employee.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property integer $employee_id
 * @property integer $cs_id
 * @property string $birthday
 * @property string $birthplace
 * @property string $sex
 * @property string $civil_status
 * @property string $citizenship
 * @property integer $height
 * @property integer $weight
 * @property string $blood_type
 * @property integer $gsis_id
 * @property integer $pagibig_id
 * @property integer $philhealth_id
 * @property integer $sss_id
 * @property string $residential_address
 * @property integer $residential_zip
 * @property integer $residential_tel_no
 * @property string $permanent_address
 * @property integer $permanent_zip
 * @property integer $permanent_tel_no
 * @property string $cellphone_no
 * @property integer $agency_emp_no
 * @property integer $tin
 * @property string $spouse_first_name
 * @property string $spouse_middle_name
 * @property string $spouse_last_name
 * @property string $spouse_occupation
 * @property string $spouse_employer
 * @property string $spouse_business_addr
 * @property integer $spouse_tel_no
 * @property string $father_first_name
 * @property string $father_middle_name
 * @property string $father_last_name
 * @property string $mother_first_name
 * @property string $mother_middle_name
 * @property string $mother_last_name
 * @property string $skills_hobbies
 * @property string $non_academic_distinctions
 * @property string $organizations
 *
 * The followings are the available model relations:
 * @property User $usr
 * @property EmployeeTraining[] $employeeTrainings
 * @property EmployeeEligibility[] $employeeEligibilities
 * @property EmployeeWork[] $employeeWorks
 * @property EmployeeChild[] $employeeChildren
 * @property EmployeeEducation[] $employeeEducations
 * @property EmployeeVolWork[] $employeeVolWorks
 * @property Document[] $documents
 * @property Leave[] $leaves
 * @property Position[] $positions
 * @property Resign[] $resigns
 * @property Transfer[] $transfers
 * @property Overtime[] $overtimes
 * @property EmployeeEvaluation[] $evaluations
 */
class Employee extends CActiveRecord
{
    public $blood = array(
        'A+'=>'A+',
        'A-'=>'A-',
        'AB+'=>'AB+',
        'AB-'=>'AB-',
        'B+'=>'B+',
        'B-'=>'B-',
        'O+'=>'O+',
        'O-'=>'O-',
    );
    public $gender = array(
        'MALE'=>'MALE',
        'FEMALE'=>'FEMALE',
    );
    public $civStatus = array(
        'SINGLE'=>'SINGLE',
        'MARRIED'=>'MARRIED',
        'ANNULLED'=>'ANNULLED',
        'WIDOWED'=>'WIDOWED',
        'SEPARATED'=>'SEPARATED',
        'OTHER'=>'OTHER',
    );
    public $status = array(
        'PENDING'=>'PENDING',
        'APPROVED'=>'APPROVED',
        'REJECTED'=>'REJECTED',
    );
    public $approve = array(
        'PENDING'=>'PENDING',
        'APPROVED'=>'APPROVED',
    );
    
    private $_fullName = null;
    private $_departmentName = null;
    private $_positionTitle = null;
    private $_salary = null;
    private $_rank = null;
    private $_role = null;
    
    /**
     * get and set constructors for retrieving full name of Employee.
     * @return string full name of Employee
     */
    public function getFullName()
    {
        if ($this->_fullName === null && $this->usr !== null) {
            $this->_fullName = $this->usr->last_name . ', ' . $this->usr->first_name. ' ' . $this->usr->middle_name;
        }
        return $this->_fullName;
    }
    public function setFullName($value)
    {
        $this->_fullName = $value;
    }
    
    /**
     * get and set constructors for retrieving name of Department.
     * @return string name of Department
     */
    public function getDepartmentName()
    {
        if ($this->_departmentName === null && $this->position !== null) {
            $this->_departmentName = $this->position->departmentName;
        }
        return $this->_departmentName;
    }
    public function setDepartmentName($value)
    {
        $this->_departmentName = $value;
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
     * get and set constructors for retrieving salary grade of Salary.
     * @return string salary grade of Salary
     */
    public function getSalary()
    {
        if ($this->_salary === null && $this->position !== null) {
            $this->_salary = $this->position->salaryGrade->salary_grade;
        }
        return $this->_salary;
    }
    public function setSalary($value)
    {
        $this->_salary = $value;
    }
    
    /**
     * get and set constructors for retrieving rank of Position.
     * @return string rank of Position
     */
    public function getRank()
    {
        if ($this->_rank === null && $this->position !== null) {
            $this->_rank = $this->position->rank;
        }
        return $this->_rank;
    }
    public function setRank($value)
    {
        $this->_rank = $value;
    }
    
    /**
     * get and set constructors for retrieving role of Position.
     * @return string role of Position
     */
    public function getRole()
    {
        if ($this->_role === null && $this->position !== null) {
            $this->_role = $this->position->role;
        }
        return $this->_role;
    }
    public function setRole($value)
    {
        $this->_role = $value;
    }
    
    /**
     * Retrieves all Employees.
     * @return CActiveDataProvider list of Employees
     */
    public function getEmployees()
    {
        return new CActiveDataProvider($this, array(
            'criteria'=>array(
                'order'=>'last_name',
                'with'=>'usr',
            )
        ));
    }
    
    /**
     * Retrieves all Documents belonging to this Employee.
     * @return listData list of Documents.
     */
    public function getAttachments()
    {
        return CHtml::listData(
            Document::model()->findAll(array(
                'condition'=>"owner_id = $this->employee_id",
                'order'=>'filename'
            )),
            'document_id',
            'filename'
        );
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
     * @return Employee the static model class
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
        return 'employee';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('birthday, birthplace, citizenship, height, weight, residential_address,
                  permanent_address, cellphone_no', 'required', 'on'=>'updatePersonal'),
            array('father_first_name, father_middle_name, father_last_name, mother_first_name,
                  mother_middle_name, mother_last_name', 'required', 'on'=>'updateFamily'),
            array('cs_id, height, weight, gsis_id, pagibig_id, philhealth_id, sss_id, residential_zip,
                  residential_tel_no, permanent_zip, permanent_tel_no, cellphone_no, agency_emp_no, tin,
                  spouse_tel_no', 'numerical', 'integerOnly'=>true),
            array('cs_id, birthday, birthplace, sex, civil_status, citizenship, height, weight, blood_type, gsis_id,
                  pagibig_id, philhealth_id, sss_id, residential_address, residential_zip, residential_tel_no,
                  permanent_address, permanent_zip, permanent_tel_no, cellphone_no, agency_emp_no, tin,
                  spouse_first_name, spouse_middle_name, spouse_last_name, spouse_occupation, spouse_employer,
                  spouse_business_addr, spouse_tel_no, father_first_name, father_middle_name, father_last_name,
                  mother_first_name, mother_middle_name, mother_last_name,
                  skills_hobbies, non_academic_distinctions, organizations', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('employee_id, cs_id, birthday, birthplace, sex, civil_status, citizenship, height, weight,
                  blood_type, gsis_id, pagibig_id, philhealth_id, sss_id, residential_address, residential_zip,
                  residential_tel_no, permanent_address, permanent_zip, permanent_tel_no, cellphone_no, agency_emp_no,
                  tin, spouse_first_name, spouse_middle_name, spouse_last_name, spouse_occupation, spouse_employer,
                  spouse_business_addr, spouse_tel_no, father_first_name, father_middle_name, father_last_name,
                  mother_first_name, mother_middle_name, mother_last_name, skills_hobbies, non_academic_distinctions,
                  organizations, fullName, departmentName, positionTitle, salary, rank, role', 'safe', 'on'=>'search'),
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
            'usr'=>array(self::BELONGS_TO, 'User', 'employee_id'),
            'employeeTrainings'=>array(self::HAS_MANY, 'EmployeeTraining', 'employee_id'),
            'employeeEligibilities'=>array(self::HAS_MANY, 'EmployeeEligibility', 'employee_id'),
            'employeeWorks'=>array(self::HAS_MANY, 'EmployeeWork', 'employee_id'),
            'employeeChildren'=>array(self::HAS_MANY, 'EmployeeChild', 'employee_id'),
            'employeeEducations'=>array(self::HAS_MANY, 'EmployeeEducation', 'employee_id'),
            'employeeVolWorks'=>array(self::HAS_MANY, 'EmployeeVolWork', 'employee_id'),
            'position'=>array(self::HAS_ONE, 'Position', 'employee_id'),
            'leaves'=>array(self::HAS_MANY, 'Leave', 'employee_id'),
            'resign'=>array(self::HAS_ONE, 'Resign', 'employee_id'),
            'documents'=>array(self::HAS_MANY, 'Document', 'owner_id'),
            'transfer'=>array(self::HAS_MANY, 'Transfer', 'employee_id'),
            'overtimes'=>array(self::HAS_MANY, 'Overtime', 'head_id'),
            'evaluations'=>array(self::HAS_MANY, 'Employee_evaluation', 'employee_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'employee_id'=>'Employee ID',
            'cs_id'=>'CS ID No.',
            'birthday'=>'Birthday',
            'birthplace'=>'Birthplace',
            'sex'=>'Sex',
            'civil_status'=>'Civil Status',
            'citizenship'=>'Citizenship',
            'height'=>'Height (m)',
            'weight'=>'Weight (kg)',
            'blood_type'=>'Blood Type',
            'gsis_id'=>'GSIS ID No.',
            'pagibig_id'=>'Pag-IBIG ID No.',
            'philhealth_id'=>'PhilHealth No.',
            'sss_id'=>'SSS No.',
            'residential_address'=>'Residential Address',
            'residential_zip'=>'Zip Code',
            'residential_tel_no'=>'Telephone No.',
            'permanent_address'=>'Permanent Address',
            'permanent_zip'=>'Zip Code',
            'permanent_tel_no'=>'Telephone No.',
            'cellphone_no'=>'Cellphone No.',
            'agency_emp_no'=>'Agency Employee No.',
            'tin'=>'TIN',
            'spouse_first_name'=>'Spouse First Name',
            'spouse_middle_name'=>'Middle Name',
            'spouse_last_name'=>'Last Name',
            'spouse_occupation'=>'Occupation',
            'spouse_employer'=>'Employer / Business Name',
            'spouse_business_addr'=>'Business Address',
            'spouse_tel_no'=>'Telephone No.',
            'father_first_name'=>'Father First Name',
            'father_middle_name'=>'Middle Name',
            'father_last_name'=>'Last Name',
            'mother_first_name'=>'Mother First Name',
            'mother_middle_name'=>'Middle Name',
            'mother_last_name'=>'Maiden Name',
            'fullName'=>'Employee Name',
            'skills_hobbies'=>'Skills / Hobbies',
            'non_academic_distinctions'=>'Non-Academic Distinctions',
            'organizations'=>'Organizations',
            'salary'=>'Salary Grade',
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
        $criteria->with = array('usr', 'position', 'position.department', 'position.salaryGrade');

        $criteria->compare('t.employee_id::VARCHAR', $this->employee_id);
        $criteria->compare('cs_id::VARCHAR', $this->cs_id);
        $criteria->compare("to_char(birthday, 'MM/DD/YYYY')", $this->birthday, true);
        $criteria->compare('LOWER(birthplace)', $this->birthplace, true);
        $criteria->compare('sex', $this->sex, true);
        $criteria->compare('LOWER(civil_status)', $this->civil_status, true);
        $criteria->compare('LOWER(citizenship)', $this->citizenship, true);
        $criteria->compare('height::VARCHAR', $this->height);
        $criteria->compare('weight::VARCHAR', $this->weight);
        $criteria->compare('LOWER(blood_type)', $this->blood_type, true);
        $criteria->compare('gsis_id::VARCHAR', $this->gsis_id);
        $criteria->compare('pagibig_id::VARCHAR', $this->pagibig_id);
        $criteria->compare('philhealth_id::VARCHAR', $this->philhealth_id);
        $criteria->compare('sss_id::VARCHAR', $this->sss_id);
        $criteria->compare('LOWER(residential_address)', $this->residential_address, true);
        $criteria->compare('residential_zip::VARCHAR', $this->residential_zip);
        $criteria->compare('residential_tel_no::VARCHAR', $this->residential_tel_no);
        $criteria->compare('LOWER(permanent_address)', $this->permanent_address, true);
        $criteria->compare('permanent_zip::VARCHAR', $this->permanent_zip);
        $criteria->compare('permanent_tel_no::VARCHAR', $this->permanent_tel_no);
        $criteria->compare('cellphone_no', $this->cellphone_no, true);
        $criteria->compare('agency_emp_no::VARCHAR', $this->agency_emp_no);
        $criteria->compare('tin::VARCHAR', $this->tin);
        $criteria->compare('LOWER(spouse_first_name)', $this->spouse_first_name, true);
        $criteria->compare('LOWER(spouse_middle_name)', $this->spouse_middle_name, true);
        $criteria->compare('LOWER(spouse_last_name)', $this->spouse_last_name, true);
        $criteria->compare('LOWER(spouse_occupation)', $this->spouse_occupation, true);
        $criteria->compare('LOWER(spouse_employer)', $this->spouse_employer, true);
        $criteria->compare('LOWER(spouse_business_addr)', $this->spouse_business_addr, true);
        $criteria->compare('spouse_tel_no::VARCHAR', $this->spouse_tel_no);
        $criteria->compare('LOWER(father_first_name)', $this->father_first_name, true);
        $criteria->compare('LOWER(father_middle_name)', $this->father_middle_name, true);
        $criteria->compare('LOWER(father_last_name)', $this->father_last_name, true);
        $criteria->compare('LOWER(mother_first_name)', $this->mother_first_name, true);
        $criteria->compare('LOWER(mother_middle_name)', $this->mother_middle_name, true);
        $criteria->compare('LOWER(mother_last_name)', $this->mother_last_name, true);
        $criteria->compare('LOWER(skills_hobbies)', $this->skills_hobbies, true);
        $criteria->compare('LOWER(non_academic_distinctions)', $this->non_academic_distinctions, true);
        $criteria->compare('LOWER(organizations)', $this->organizations, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare('LOWER(department.name)', $this->departmentName, true);
        $criteria->compare('LOWER(position.title)', $this->positionTitle, true);
        $criteria->compare('"salaryGrade".salary_grade::VARCHAR', $this->salary);
        $criteria->compare('position.rank::VARCHAR', $this->rank);
        $criteria->compare('LOWER(position.role)', $this->role, true);
        
        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'employee_id'=>array(
                'asc'=>'t.employee_id',
                'desc'=>'t.employee_id desc',
            ),
            'fullName'=>array(
                'asc'=>'usr.last_name',
                'desc'=>'usr.last_name desc',
            ),
            'departmentName'=>array(
                'asc'=>'department.name',
                'desc'=>'department.name desc',
            ),
            'positionTitle'=>array(
                'asc'=>'position.title',
                'desc'=>'position.title desc',
            ),
            'rank'=>array(
                'asc'=>'position.rank',
                'desc'=>'position.rank desc',
            ),
            'role'=>array(
                'asc'=>'position.role',
                'desc'=>'position.role desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}