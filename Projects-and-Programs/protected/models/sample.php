<?php

/**
 * This is the model class for table "projectProgram".
 *
 * The followings are the available columns in table 'projectProgram':
 * @property string $project_program_title
 * @property double $cost
 * @property string $location
 * @property string $source_of_fund
 * @property string $contractor
 * @property string $sector
 * @property string $project_program_no
 * @property string $date_started
 * @property string $date_completed
 * @property string $due_date
 * @property string $status
 */
class sample extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return sample the static model class
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
		return 'projectProgram';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_program_title, cost, location, source_of_fund, contractor', 'required'),
			array('cost', 'numerical'),
			array('project_program_title', 'length', 'max'=>200),
			array('location, source_of_fund, contractor, sector', 'length', 'max'=>100),
			array('status', 'length', 'max'=>50),
			array('date_started, date_completed, due_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_program_title, cost, location, source_of_fund, contractor, sector, project_program_no, date_started, date_completed, due_date, status', 'safe', 'on'=>'search'),
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
			'project_program_title' => 'Project Program Title',
			'cost' => 'Cost',
			'location' => 'Location',
			'source_of_fund' => 'Source Of Fund',
			'contractor' => 'Contractor',
			'sector' => 'Sector',
			'project_program_no' => 'Project Program No',
			'date_started' => 'Date Started',
			'date_completed' => 'Date Completed',
			'due_date' => 'Due Date',
			'status' => 'Status',
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

		$criteria=new CDbCriteria;

		$criteria->compare('project_program_title',$this->project_program_title,true);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('source_of_fund',$this->source_of_fund,true);
		$criteria->compare('contractor',$this->contractor,true);
		$criteria->compare('sector',$this->sector,true);
		$criteria->compare('project_program_no',$this->project_program_no,true);
		$criteria->compare('date_started',$this->date_started,true);
		$criteria->compare('date_completed',$this->date_completed,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
