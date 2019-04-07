<?php


namespace common\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Authors extends ActiveRecord
{
    public function rules()
    {
        return [
            [['firstname','lastname'],'required'],
            [['firstname'],'string', 'max' => 25],
            [['lastname'],'string', 'max' => 35],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
        ];
    }
    public static function getlist()
    {
        $list = self::find()->asArray()->all();
        if($list==null)return [null,null];
        foreach ($list as $elem){

            $resArray[$elem['id']] = trim($elem['firstname']).' '.trim($elem['lastname']);
        }
        return $resArray;
    }
}