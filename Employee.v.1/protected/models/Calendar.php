<?php
/**
 * Model class for Calendar.
 *
 * @package EmployeeInformationSystem
 * @subpackage Calendar
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "calendar".
 *
 * The followings are the available columns in table 'calendar':
 * @property integer $entry_id
 * @property string $author
 * @property string $date
 * @property string $details
 */
class Calendar extends CActiveRecord
{
    /**
     * Retrieve Calendar Entries according to selected date.
     *
     * This contains multiple joins and unions to retrieve calendar entries.
     * The parent select statement retrieves all entries from the multiple select statements.
     * The first child select statement retrieves all entries created by the Admin or Department Head.
     * The second retrieves all birthdays with the year replaced with the current year, creates SYSTEM as author,
     * and creates the details column containing a birthday message with the full name of the user.
     * The third retrieves all approved leaves, creates SYSTEM as author, and creates the details column containing the
     * details of the leave. The two child select statements in its FROM block makes a UNION query of the start and end
     * dates of the leave and appends either 'Start of' or 'End of' to its details column. These details are then
     * appended with the leave type and the full name of the user.
     * The fourth retrieves all overtime orders, creates SYSTEM as author, and creates the details of the overtime.
     * The fifth retrieves all approved resignations, creates SYSTEM as author, and creates the details of the
     * resignation.
     * The sixth retrieves all approved transfers, creates SYSTEM as author, and creates the details of the transfer.
     * The resulting data from these UNION of queries are grouped according to date, and are filtered according
     * to the current year and month. If a day is specified in the url parameters, an additional day filter will
     * be added to the query.
     *
     * @return CSqlDataProvider filtered Calendar Entries
     */
    public function getCalendarEntries()
    {
        $month = isset($_GET['month']) ? $_GET['month'] : date('m');
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

        $sql = "
            SELECT
                date,
                author,
                string_agg('- '|| details, '<br>') AS details
            FROM (
                SELECT
                    date,
                    author,
                    details
                FROM calendar
                UNION
                SELECT
                    to_date(($year || substr(e.birthday::VARCHAR, 5, 10)), 'YYYY-MM-DD') AS date,
                    'SYSTEM' AS author,
                    'Happy Birthday ' || first_name || ' ' || middle_name || ' ' || last_name AS details
                FROM employee e JOIN \"user\" u ON e.employee_id = u.user_id
                UNION
                SELECT
                    date,
                    'SYSTEM' AS author,
                    details || leave_type.name || ' LEAVE of ' ||
                    u.first_name || ' ' || u.middle_name || ' ' || u.last_name AS details
                FROM (
                    SELECT
                        employee_id,
                        date_from AS date,
                        'Start of ' AS details,
                        leave_type,
                        head_status
                    FROM leave
                    UNION 
                    SELECT 
                        employee_id,
                        date_to,
                        'End of ' AS details,
                        leave_type,
                        head_status
                    FROM leave
                ) AS leave
                JOIN leave_type ON leave.leave_type = leave_type.leave_type_id
                JOIN \"user\" u ON leave.employee_id = u.user_id
                WHERE leave.head_status = 'APPROVED'
                UNION
                SELECT
                    time::DATE AS date,
                    'SYSTEM' AS author,
                    'OVERTIME order from ' || d.name AS details
                FROM overtime o 
                JOIN position p ON o.head_id = p.employee_id
                JOIN department d ON p.position_id = d.head_id
                UNION
                SELECT
                    approve_date AS date,
                    'SYSTEM' AS author,
                    'Approved RESIGNATION of ' ||
                    u.first_name || ' ' || u.middle_name || ' ' || u.last_name AS details
                FROM resign r JOIN \"user\" u ON r.employee_id = u.user_id
                WHERE hrmo_status = 'APPROVED'
                UNION
                SELECT
                    approve_date AS date,
                    'SYSTEM' AS author,
                    'Approved TRANSFER of ' ||
                    u.first_name || ' ' || u.middle_name || ' ' || u.last_name AS details
                FROM transfer t JOIN \"user\" u ON t.employee_id = u.user_id
                WHERE emp_status = 'APPROVED'
                ORDER by date, details
            ) AS calendar
            WHERE extract(year FROM date) = $year AND extract(month FROM date) = $month
            GROUP BY date, author
            ORDER BY date";            
        $count = Yii::app()->db->createCommand("SELECT count(*) FROM ($sql) AS count")->queryScalar();
        
        return new CSqlDataProvider($sql, array(
            'keyField'=>'date',
            'totalItemCount'=>$count,
        ));
    }
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Calendar the static model class
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
        return 'calendar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('date, details', 'required'),
            array('author, date, details', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('entry_id, author, date, details', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'entry_id'=>'Entry ID',
            'author'=>'Author',
            'date'=>'Date',
            'details'=>'Details',
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

        $criteria->compare('entry_id::VARCHAR', $this->entry_id);
        $criteria->compare('LOWER(author)', $this->author, true);
        $criteria->compare('date::VARCHAR', $this->date, true);
        $criteria->compare('LOWER(details)', $this->details, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}