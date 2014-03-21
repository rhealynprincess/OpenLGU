<?php

/**
 * This is the model class for table "bid".
 *
 * The followings are the available columns in table 'bid':
 * @property integer $id
 * @property integer $invitation_id
 * @property integer $user_id
 * @property double $correct_calculated_price
 * @property string $status
 *
 * The followings are the available model relations:
 * @property EligibilityBid $eligibilityB
 * @property FinancialBid $financialB
 * @property TechnicalBid $technicalB
 * @property Invitation $invitation
 * @property User $user
 */
class Bid extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bid the static model class
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
		return 'bid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invitation_id, user_id', 'required'),
			array('invitation_id, user_id', 'numerical', 'integerOnly'=>true),
			array('correct_calculated_price', 'numerical'),
			array('status', 'safe'),
			//array('remarks', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invitation_id, user_id, correct_calculated_price, status', 'safe', 'on'=>'search'),
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
			'eligibilityB' => array(self::HAS_ONE, 'EligibilityBid', 'id'),
			'financialB' => array(self::HAS_ONE, 'FinancialBid', 'id'),
			'technicalB' => array(self::HAS_ONE, 'TechnicalBid', 'id'),
			'invitation' => array(self::BELONGS_TO, 'Invitation', 'invitation_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'invitation_id' => 'Invitation',
			'user_id' => 'User',
			'correct_calculated_price' => 'Correct Calculated Price',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('invitation_id',$this->invitation_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('correct_calculated_price',$this->correct_calculated_price);
		$criteria->compare('status',$this->status,true);
		//$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
