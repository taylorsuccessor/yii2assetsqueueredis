<?php
namespace app\models\car;

use yii\db\ActiveRecord;

class Car extends ActiveRecord
{


    public  $foo;
/**
* @return string the name of the table associated with this ActiveRecord class.
*/
public static function tableName()
{
return '{{car}}';
}


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'birth_day' => 'Birth Day',
            'description' => 'Description',
        ];
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // all fields required
            [['name', 'email','phone','birth_day','description'], 'required'],
            // checks if "email" is a valid email address
            ['email', 'email'],

            [['birth_day'], 'date', 'format' => 'php:Y-m-d'],

            ['phone', 'filter', 'filter' => function ($value) {
                // normalize phone input here
                return $value;
            }],
            // checks if "description" is a string  length is between 1 and 300
            ['description', 'string', 'length' => [1, 300]],
        ];
    }



}