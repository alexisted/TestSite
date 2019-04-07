<?php


namespace common\models;

use yii\db\ActiveRecord;

class Books extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name'],'required'],
            [['name'],'string', 'max' => 90],
            [['author_id'], 'required'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'название произведения',
            'author_id' => 'автор',
        ];
    }

}