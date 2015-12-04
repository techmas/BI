<?php

/**
 * This is the model class for table "conversion".
 *
 * The followings are the available columns in table 'conversion':
 * @property integer $id
 * @property string $total
 * @property integer $target_id
 * @property integer $platform_id
 * @property integer $sales_id
 *
 * The followings are the available model relations:
 * @property Target $target
 * @property Platform $platform
 * @property Sales $sales
 */
class Conversion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'conversion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('target_id, platform_id, sales_id', 'required'),
			array('target_id, platform_id, sales_id', 'numerical', 'integerOnly'=>true),
			array('total', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, total, target_id, platform_id, sales_id', 'safe', 'on'=>'search'),
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
			'target' => array(self::BELONGS_TO, 'Target', 'target_id'),
			'platform' => array(self::BELONGS_TO, 'Platform', 'platform_id'),
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
			'total' => 'Total',
			'target_id' => 'Target',
			'platform_id' => 'Platform',
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
		$criteria->compare('total',$this->total,true);
		$criteria->compare('target_id',$this->target_id);
		$criteria->compare('platform_id',$this->platform_id);
		$criteria->compare('sales_id',$this->sales_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Conversion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
