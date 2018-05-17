<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;


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
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        ArrayHelper::remove($behaviors, TimestampBehavior::class);
        ArrayHelper::remove($behaviors, BlameableBehavior::class);

        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'unique'],
            [['code'], 'validateCode'],
            [['priority'], 'integer'],
            [['is_active'], 'boolean'],
            [['course'], 'number'],
            [['name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id'        => \Yii::t('skeeks/money', 'ID'),
            'code'      => \Yii::t('skeeks/money', "Currency"),
            'is_active'    => \Yii::t('skeeks/money', 'Active'),
            'course'    => \Yii::t('skeeks/money', "Rate"),
            'name'      => \Yii::t('skeeks/money', "Name"),
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

    static public $models = [];

    /**
     * @param $code
     * @return static
     */
    static public function getByCode($code)
    {
        if (!isset(self::$models[$code])) {
            self::$models[$code] = self::find()->where(['code' => $code]);
        }

        return self::$models[$code];
    }

}