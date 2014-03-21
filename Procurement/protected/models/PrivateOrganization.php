<?php

/**
 * This is the model class for table "private_organization".
 *
 * The followings are the available columns in table 'private_organization':
 * @property integer $id
 * @property string $form
 * @property string $type
 * @property string $business_category
 * @property string $business_tax_id_number
 * @property string $dti_reg_number
 * @property string $sec_reg_number
 * @property string $cda_reg_number
 * @property string $incorporation_date
 * @property integer $employees_count
 * @property double $prev_year_revenue
 *
 * The followings are the available model relations:
 * @property Organization $id0
 */
class PrivateOrganization extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PrivateOrganization the static model class
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
		return 'private_organization';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employees_count', 'numerical', 'integerOnly'=>true),
			array('prev_year_revenue', 'numerical'),
			array('form, type, business_category, business_tax_id_number, dti_reg_number, sec_reg_number, cda_reg_number, incorporation_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, form, type, business_category, business_tax_id_number, dti_reg_number, sec_reg_number, cda_reg_number, incorporation_date, employees_count, prev_year_revenue', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'Organization', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'form' => 'Form',
			'type' => 'Type',
			'business_category' => 'Business Category',
			'business_tax_id_number' => 'Business Tax Id Number',
			'dti_reg_number' => 'DTI Reg Number',
			'sec_reg_number' => 'SEC Reg Number',
			'cda_reg_number' => 'CDA Reg Number',
			'incorporation_date' => 'Incorporation Date',
			'employees_count' => 'Employees Count',
			'prev_year_revenue' => 'Prev Year Revenue',
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
		$criteria->compare('form',$this->form,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('business_category',$this->business_category,true);
		$criteria->compare('business_tax_id_number',$this->business_tax_id_number,true);
		$criteria->compare('dti_reg_number',$this->dti_reg_number,true);
		$criteria->compare('sec_reg_number',$this->sec_reg_number,true);
		$criteria->compare('cda_reg_number',$this->cda_reg_number,true);
		$criteria->compare('incorporation_date',$this->incorporation_date,true);
		$criteria->compare('employees_count',$this->employees_count);
		$criteria->compare('prev_year_revenue',$this->prev_year_revenue);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
