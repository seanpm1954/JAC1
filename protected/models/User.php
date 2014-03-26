<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $company_id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $access
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Project[] $projects
 * @property Company $company
 * @property Access $access0
 * @property Active $active0
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, first_name, last_name, username, password, access, active', 'required'),
			array('company_id, access, active', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, username, password', 'length', 'max'=>20),
			array('email', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_id, first_name, last_name, username, email, password, access, active', 'safe', 'on'=>'search'),
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
			'projects' => array(self::HAS_MANY, 'Project', 'user_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'access0' => array(self::BELONGS_TO, 'Access', 'access'),
			'active0' => array(self::BELONGS_TO, 'Active', 'active'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' => 'Company',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'access' => 'Access',
			'active' => 'Active',
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
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('access',$this->access);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getCompName($id){
        $compArray=Company::model()->findByPk($id);
        return $compArray->company_name;
    }

    public function getAllCompName(){
        $compArray=CHtml::listData(Company::model()->findAll(),'id','company_name');
        return $compArray;
    }

    public function getActiveName(){
        $activeArray=CHtml::listData(Active::model()->findAll(),'id','active');
        return $activeArray;
    }
    public function getAccessName(){
        $accessArray=CHtml::listData(Access::model()->findAll(),'id','access');
        return $accessArray;
    }
}
