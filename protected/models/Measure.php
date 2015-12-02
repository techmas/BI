<?php

/**
 * This is the model class for table "measure".
 *
 * The followings are the available columns in table 'measure':
 * @property integer $id
 * @property double $epc
 * @property integer $ltv
 * @property integer $arpu
 * @property integer $crs
 * @property integer $sales_id
 *
 * The followings are the available model relations:
 * @property Sales $sales
 */
class Measure extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'measure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('epc, sales_id', 'required'),
			array('ltv, arpu, crs, sales_id', 'numerical', 'integerOnly'=>true),
			array('epc', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, epc, ltv, arpu, crs, sales_id', 'safe', 'on'=>'search'),
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
			'sales' => array(self::BELONGS_TO, 'Sales', 'sales_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'epc' => 'Epc',
			'ltv' => 'Ltv',
			'arpu' => 'Arpu',
			'crs' => 'Crs',
			'sales_id' => 'Sales',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('epc',$this->epc);
		$criteria->compare('ltv',$this->ltv);
		$criteria->compare('arpu',$this->arpu);
		$criteria->compare('crs',$this->crs);
		$criteria->compare('sales_id',$this->sales_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Measure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
