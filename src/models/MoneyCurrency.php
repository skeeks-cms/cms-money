<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money\models;


/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class MoneyCurrency extends \skeeks\cms\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%money_currency}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['code'], 'required'],
            [['code'], 'unique'],
            [['code'], 'validateCode'],
            [['priority'], 'integer'],
            [['active'], 'string'],
            [['course'], 'number'],
            [['name', 'name_full'], 'safe'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id'        => \Yii::t('skeeks/money', 'ID'),
            'code'      => \Yii::t('skeeks/money', "Currency"),
            'active'    => \Yii::t('skeeks/money', 'Active'),
            'course'    => \Yii::t('skeeks/money', "Rate"),
            'name'      => \Yii::t('skeeks/money', "Name"),
            'name_full' => \Yii::t('skeeks/money', "Full name"),
            'priority'  => \Yii::t('skeeks/money', 'Priority'),
        ]);
    }


    public function validateCode($attribute)
    {
        if (!preg_match('/^[A-Z]{3}$/', $this->$attribute)) {
            $this->addError($attribute,
                \Yii::t('skeeks/money', 'Use only uppercase letters. Example RUB (3 characters)'));
        }
    }

}