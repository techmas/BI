<?php

/**
 * This is the model class for table "commodity".
 *
 * The followings are the available columns in table 'commodity':
 * @property integer $id
 * @property string $name
 * @property integer $profit
 * @property integer $revenue
 * @property integer $quantity
 * @property integer $sales_id
 * @property integer $platform_id
 *
 * The followings are the available model relations:
 * @property Sales $sales
 * @property Platform $platform
 */
class Commodity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'commodity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quantity, sales_id, platform_id', 'required'),
			array('profit, revenue, quantity, sales_id, platform_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, profit, revenue, quantity, sales_id, platform_id', 'safe', 'on'=>'search'),
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
			'platform' => array(self::BELONGS_TO, 'Platform', 'platform_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'profit' => 'Profit',
			'revenue' => 'Revenue',
			'quantity' => 'Quantity',
			'sales_id' => 'Sales',
			'platform_id' => 'Platform',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('profit',$this->profit);
		$criteria->compare('revenue',$this->revenue);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('sales_id',$this->sales_id);
		$criteria->compare('platform_id',$this->platform_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Commodity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
