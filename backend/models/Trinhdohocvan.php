<?php

namespace backend\models;

use Yii;
use common\models\myFuncs;
/**
 * This is the model class for table "{{%trinhdohocvan}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 *
 * @property Hocvien[] $hocviens
 */
class Trinhdohocvan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trinhdohocvan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'code'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Trình độ'),
            'code' => Yii::t('app', 'Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHocviens()
    {
        return $this->hasMany(Hocvien::className(), ['trinhdohocvan_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        $this->code = myFuncs::createCode($this->name);
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
