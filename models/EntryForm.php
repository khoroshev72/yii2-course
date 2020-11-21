<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $text;
    public $topic;

    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'],
            ['email', 'email'],
            ['topic', 'validateCountry', 'skipOnEmpty' => false],
        ];
    }

    public function validateCountry($attribute, $params)
    {
        if (!in_array($this->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($attribute, 'Страна должна быть либо "USA" или "Indonesia".');
        }
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'text' => 'Текст'
        ];
    }

}