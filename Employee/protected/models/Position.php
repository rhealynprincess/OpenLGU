<?php
/**
 * Model class for Position.
 *
 * @package EmployeeInformationSystem
 * @subpackage Position
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "position".
 *
 * The followings are the available columns in table 'position':
 * @property integer $position_id
 * @property integer $department_id
 * @property integer $employee_id
 * @property string $title
 * @property integer $rank
 * @property integer $salary_grade
 * @property string $details
 * @property string $location
 * @property string $education
 * @property string $experience
 * @property string $training
 * @property string $eligibility
 * @property string $role
 * @property integer $level
 * @property string $appoint_date
 * @property string $vacancy_date
 *
 * The followings are the available model relations:
 * @property Department[] $departments
 * @property Department $department
 * @property Employee $employee
 * @property Salary $salaryGrade

 */
class Position extends CActiveRecord
{
    public $roleList = array(
        'USER'=>'USER',
        'HRMO'=>'HRMO',
    );
    
    private $_fullName = null;
    private $_departmentName = null;
    private $_salary = null;
    
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
     * get and set constructors for retrieving name of Department.
     * @return string name of Department
     */
    public function getDepartmentName()
    {
        if ($this->_departmentName === null && $this->department !== null) {
            $this->_departmentName = $this->department->name;
        }
        return $this->_departmentName;
    }
    public function setDepartmentName($value)
    {
        $this->_departmentName = $value;
    }
    
    /**
     * get and set constructors for retrieving salary grade of Salary.
     * @return string salary grade of Salary
     */
    public function getSalary()
    {
        if ($this->_salary === null && $this->salaryGrade !== null) {
            $this->_salary = $this->salaryGrade->salary_grade;
        }
        return $this->_salary;
    }
    public function setSalary($value)
    {
        $this->_salary = $value;
    }
    
    /**
     * Retrieves all Departments.
     * @return listData list of Departments
     */
    public function getDepartments()
    {
        return CHtml::listData(
            Department::model()->findAll(array('order'=>'name')),
            'department_id',
            'name'
        );
    }
    
    /**
     * Retrieves all active Employees which does not have a Position.
     * @return listData list of Employees
     */
    public function getEmployees()
    {
        $employees = ($this->employee_id) ? $this->employee_id : '0';
        
        return CHtml::listData(
            User::model()->findAll(array(
                'condition'=>"user_id = $employees OR (
                    status = 'ACTIVE' AND user_id NOT IN
                    (SELECT employee_id FROM position WHERE employee_id IS NOT NULL)
                )",
                'order'=>'last_name'
            )),
            'user_id',
            'fullName'
        );
    }
    
    /**
     * Generates array of ranks for a Position.
     * @return array array of ranks
     */
    public function getRanks()
    {    
        $rank = array();
        
        for ($i=1; $i<=30; $i++) {
            $rank[$i] = $i;
        }
        return $rank;
    }
    
    /**
     * Retrieves all salary grades from Salary.
     * @return listData list of salary grades
     */
    public function getSalaryGrades()
    {
        return CHtml::listData(
            Salary::model()->findAll(array('order'=>'salary_id')),
            'salary_id',
            'salary_grade'
        );
    }
    
    /**
     * Appoints an Employee to a new Position
     *
     * This removes a User in a Position and reverts his/her role back to USER if he/she is not ADMIN.
     * It then checks if a new User is appointed to the Position and updates the position details and
     * the role of the User accordingly. The vacancy and appoint dates change based on the current state
     * of the Position.
     *
     * @params integer $current current User in the Position
     * @params integer $new new User in the Position
     */
    public function appoint($current, $new)
    {
        $this->employee_id = null;
        $this->appoint_date = null;
        $this->vacancy_date = date('m/d/Y');
        $user = User::model()->findByPk($current);
        if ($user && $user->role !== 'ADMIN') {
            $user->role = 'USER';
            $user->save();
        }
        if ($new) {
            $this->employee_id = $new;
            $this->appoint_date = date('m/d/Y');
            $this->vacancy_date = null;
            $user = User::model()->findByPk($new);
            if ($user && $user->role !== 'ADMIN') {
                $user->role = $this->role;
                $user->save();
            }
        }
        $this->save();
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
     * @return Position the static model class
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
        return 'position';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, details, location, education, experience, training, eligibility', 'required'),
            array('employee_id', 'unique'),
            array('department_id, employee_id, rank, salary_grade', 'numerical', 'integerOnly'=>true),
            array('title, details, location, education, experience, training, eligibility,
                  level, appoint_date, vacancy_date, role', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('position_id, department, employee_id, title, rank, salary_grade, details, location,
                  education, experience, training, eligibility, fullName, departmentName, salary,
                  role, appoint_date, vacancy_date', 'safe', 'on'=>'search'),
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
            'department'=>array(self::BELONGS_TO, 'Department', 'department_id'),
            'employee'=>array(self::BELONGS_TO, 'Employee', 'employee_id'),
            'headEmployee'=>array(self::BELONGS_TO, 'Employee', 'employee_id'),
            'salaryGrade'=>array(self::BELONGS_TO, 'Salary', 'salary_grade'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'position_id'=>'Position ID',
            'department_id'=>'Department',
            'employee_id'=>'Employee Name',
            'title'=>'Position Title',
            'rank'=>'Rank',
            'salary_grade'=>'Salary Grade',
            'details'=>'Requirements',
            'location'=>'Location',
            'education'=>'Education',
            'experience'=>'Experience',
            'training'=>'Training',
            'eligibility'=>'Eligibility',
            'fullName'=>'Employee Name',
            'salary'=>'Salary Grade',
            'role'=>'Role',
            'level'=>'Level',
            'appoint_date'=>'Appointment Date',
            'vacancy_date'=>'Vacancy Date',
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
        $criteria->with = array('employee.usr', 'department', 'salaryGrade');

        $criteria->compare('position_id::VARCHAR', $this->position_id);
        $criteria->compare('department_id', $this->department_id);
        $criteria->compare('employee_id', $this->employee_id);
        $criteria->compare('LOWER(title)', $this->title, true);
        $criteria->compare('rank::VARCHAR', $this->rank);
        $criteria->compare('t.salary_grade', $this->salary_grade);
        $criteria->compare('LOWER(details)', $this->details, true);
        $criteria->compare('LOWER(location)', $this->location, true);
        $criteria->compare('LOWER(education)', $this->education, true);
        $criteria->compare('LOWER(experience)', $this->experience, true);
        $criteria->compare('LOWER(training)', $this->training, true);
        $criteria->compare('LOWER(eligibility)', $this->eligibility, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare('LOWER(department.name)', $this->departmentName, true);
        $criteria->compare('"salaryGrade".salary_grade::VARCHAR', $this->salary);
        $criteria->compare('LOWER(t.role)', $this->role, true);
        $criteria->compare('level::VARCHAR', $this->level, true);
        $criteria->compare("to_char(appoint_date, 'MM/DD/YYYY')", $this->appoint_date, true);
        $criteria->compare("to_char(vacancy_date, 'MM/DD/YYYY')", $this->vacancy_date, true);

        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'position_id'=>array(
                'asc'=>'position_id',
                'desc'=>'position_id desc',
            ),
            'departmentName'=>array(
                'asc'=>'department.name',
                'desc'=>'department.name desc',
            ),
            'title'=>array(
                'asc'=>'title',
                'desc'=>'title desc',
            ),
            'fullName'=>array(
                'asc'=>'usr.last_name',
                'desc'=>'usr.last_name desc',
            ),
            'role'=>array(
                'asc'=>'t.role',
                'desc'=>'t.role desc',
            ),
            'appoint_date'=>array(
                'asc'=>'appoint_date',
                'desc'=>'appoint_date desc',
            ),
            'vacancy_date'=>array(
                'asc'=>'vacancy_date',
                'desc'=>'vacancy_date desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}