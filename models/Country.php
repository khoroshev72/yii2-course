<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    public static function tableName()
    {
        return 'country';
    }

    public function rules()
    {
        return [
            [['code', 'name', 'population', 'status'], 'required'],
            [['code','name'], 'unique'],
            ['population', 'integer'],
            ['status', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => 'Код',
            'name'=> 'Страна',
            'population' => 'Население',
            'status' => 'Статус',
        ];
    }
}