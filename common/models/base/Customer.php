<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $brithday
 * @property int $gender
 * @property int $permission
 * @property int $province_id
 * @property int $district_id
 * @property string $address
 * @property string $phone
 * @property int $status
 * @property int $created_at
 *
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'created_at'], 'required'],
            [['brithday'], 'safe'],
            [['gender', 'permission', 'province_id', 'district_id', 'status', 'created_at'], 'integer'],
            [['name', 'email', 'address', 'phone'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'brithday' => Yii::t('app', 'Brithday'),
            'gender' => Yii::t('app', 'Gender'),
            'permission' => Yii::t('app', 'Permission'),
            'province_id' => Yii::t('app', 'Province ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'address' => Yii::t('app', 'Address'),
            'phone' => Yii::t('app', 'Phone'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id']);
    }
}
