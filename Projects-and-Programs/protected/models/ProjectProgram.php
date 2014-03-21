<?php

/**
 * This is the model class for table "projectProgram".
 *
 * The followings are the available columns in table 'projectProgram':
 * @property string $project_program_no
 * @property string $project_program_title
 * @property double $cost
 * @property string $location
 * @property string $source_of_fund
 * @property string $date_started
 * @property string $date_completed
 * @property string $contractor
 * @property string $sector
 */
class ProjectProgram extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectProgram the static model class
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
		/*return array(
			array('project_program_no, project_program_title, cost, location, source_of_fund, date_started, date_completed, contractor', 'required'),
			array('cost', 'numerical'),
			array('project_program_title', 'length', 'max'=>200),
			array('location, source_of_fund, contractor, sector', 'length', 'max'=>100),
			array('date_started, date_completed, due_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_program_no, project_program_title, cost, location, source_of_fund, date_started, date_completed,status, contractor, sector', 'safe', 'on'=>'search'),
		);*/

		return array(
			array('project_program_title, cost, location, source_of_fund, contractor', 'required'),
			array('cost', 'numerical'),
			array('project_program_title', 'length', 'max'=>200),
			array('location, source_of_fund, contractor, sector,remarks', 'length', 'max'=>100),
			array('status', 'length', 'max'=>50),
			array('date_started, date_completed, due_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_program_title, cost, location, source_of_fund, contractor, sector, project_program_no, date_started, date_completed, due_date, status,remarks', 'safe', 'on'=>'search'),
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
			'project_program_no' => 'Project Program No',
			'project_program_title' => 'Project Program Title',
			'cost' => 'Cost',
			'location' => 'Location',
			'source_of_fund' => 'Source Of Fund',
			'date_started' => 'Date Started',
			'date_completed' => 'Date Completed',
			'due_date' => 'Due Date',
			'status'=>'Status',
			'contractor' => 'Contractor',
			'sector' => 'Sector', 
			'remarks' => 'Remarks',
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
		$criteria->order='date_completed desc';
		$criteria->compare('project_program_no',$this->project_program_no,true);
		$criteria->compare('project_program_title',$this->project_program_title,true);
		$criteria->compare('cost',$this->cost);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('source_of_fund',$this->source_of_fund,true);
		
	if($this->date_started!=''){ 
				$curryear=date('Y')+1;
				$exploded=explode('-', $this->date_started);
		if(count($exploded)==3){
			if(strlen($exploded[0])==4 and strlen($exploded[1])==2 and strlen($exploded[2])==2 )	{
					if(($exploded[0]>0000 and $exploded[0]<$curryear)and ($exploded[1]>0 and $exploded[1]<13)and($exploded[2]>0 and $exploded[2]<32)){
						$criteria->addInCondition('date_started',array($this->date_started));
						}

					else{
				$criteria->addInCondition('date_started',array('0001-01-01'));
				}
			}
			else{
				$criteria->addInCondition('date_started',array('0001-01-01'));
			}
			
		}
		else{
				$criteria->addInCondition('date_started',array('0001-01-01'));
			}

	}

	if($this->date_completed!=''){ 
				$curryear=date('Y')+1;
				$exploded=explode('-', $this->date_completed);
		if(count($exploded)==3){
			if(strlen($exploded[0])==4 and strlen($exploded[1])==2 and strlen($exploded[2])==2 )	{
					if(($exploded[0]>0000 )and ($exploded[1]>0 and $exploded[1]<13)and($exploded[2]>0 and $exploded[2]<32)){
						$criteria->addInCondition('date_completed',array($this->date_completed));
						}

					else{
				$criteria->addInCondition('date_completed',array('0001-01-01'));
				}
			}
			else{
				$criteria->addInCondition('date_completed',array('0001-01-01'));
			}
			
		}
		else{
				$criteria->addInCondition('date_completed',array('0001-01-01'));
			}

	}



	
	if($this->due_date!=''){ 
				$curryear=date('Y')+1;
				$exploded=explode('-', $this->due_date);
		if(count($exploded)==3){
			if(strlen($exploded[0])==4 and strlen($exploded[1])==2 and strlen($exploded[2])==2 )	{
					if(($exploded[0]>0000 )and ($exploded[1]>0 and $exploded[1]<13)and($exploded[2]>0 and $exploded[2]<32)){
						$criteria->addInCondition('due_date',array($this->due_date));
						}

					else{
				$criteria->addInCondition('due_date',array('0001-01-01'));
				}
			}
			else{
				$criteria->addInCondition('due_date',array('0001-01-01'));
			}
			
		}
		else{
				$criteria->addInCondition('due_date',array('0001-01-01'));
			}

	}
		//$criteria->compare('date_started',$this->date_started,true);
		//$criteria->compare('date_completed',$this->date_completed,true);
		//$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('contractor',$this->contractor,true);
		$criteria->compare('sector',$this->sector,true);
$criteria->compare('remarks',$this->remarks,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

		
		
	}
}
