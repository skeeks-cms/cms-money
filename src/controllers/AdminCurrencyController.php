<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money\controllers;

use skeeks\cms\actions\backend\BackendModelMultiActivateAction;
use skeeks\cms\actions\backend\BackendModelMultiDeactivateAction;
use skeeks\cms\backend\BackendAction;
use skeeks\cms\backend\controllers\BackendModelStandartController;
use skeeks\cms\grid\BooleanColumn;
use skeeks\cms\money\Currency;
use skeeks\cms\money\models\MoneyCurrency;
use skeeks\yii2\form\fields\BoolField;
use yii\helpers\ArrayHelper;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminCurrencyController extends BackendModelStandartController
{
    public function init()
    {
        $this->name = \Yii::t('skeeks/money', "Currency management");
        $this->modelShowAttribute = "id";
        $this->modelClassName = MoneyCurrency::class;

        parent::init();
    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [

            "index" => [
                'filters' => [
                    'visibleFilters' => [
                        'code',
                    ],
                ],
                'grid'    => [
                    'defaultOrder'   => [
                        'is_active' => SORT_DESC,
                        'priority'  => SORT_ASC,
                    ],
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'id',
                        'code',
                        'name',
                        'course',
                        'is_active',
                        'priority',
                    ],
                    'columns'        => [
                        'is_active' => [
                            'class'      => BooleanColumn::class,
                            'falseValue' => 0,
                            'trueValue'  => 1,
                        ],
                    ],
                ],
            ],

            "create" => [
                'fields' => [$this, 'updateFields'],
            ],

            "update" => [
                'fields' => [$this, 'updateFields'],
            ],

            "activate-multi" => [
                'class'     => BackendModelMultiActivateAction::class,
                'attribute' => 'is_active',
                'value'     => 1,
            ],

            "deactivate-multi" => [
                'class'     => BackendModelMultiDeactivateAction::class,
                'attribute' => 'is_active',
                'value'     => 0,
            ],


            'update-all' => [
                "class"    => BackendAction::class,
                "name"     => \Yii::t('skeeks/money', "Update all currencies"),
                "icon"     => "glyphicon glyphicon-paperclip",
                "callback" => [$this, 'actionUpdateAll'],
            ],

            'update-course' => [
                "class"    => BackendAction::class,
                "name"     => \Yii::t('skeeks/money', "Refresh rate"),
                "icon"     => "glyphicon glyphicon-paperclip",
                "callback" => [$this, 'actionUpdateCourse'],
            ],

        ]);
    }

    public function updateFields()
    {
        return [
            'code',
            'name',
            'is_active' => [
                'class' => BoolField::class,
            ],
            'course',
            'priority',
        ];
    }

    public function actionUpdateAll()
    {
        if (\Yii::$app->request->isPost) {
            foreach (Currency::$currencies as $code => $data) {
                $currency = new Currency($code);MoneyComponent

                if (!$currencyModel = MoneyCurrency::find()->where(['code' => $code])->one()) {
                    $currencyModel = new MoneyCurrency([
                        'code'      => $code,
                        'is_active' => 0,
                        'name'      => $currency->name,
                    ]);

                    $currencyModel->save(false);
                } else {
                    if (!$currencyModel->name) {
                        $currencyModel->name = $currency->name;
                    }


                    $currencyModel->save(false);
                }
            }

        }

        return $this->render('update-all');
    }

    public function actionUpdateCourse()
    {
        if (\Yii::$app->request->isPost) {
            \Yii::$app->money->processUpdateCourses();
            \Yii::$app->session->setFlash('success', \Yii::t('skeeks/money', 'Data successfully updated'));

        }

        return $this->render('update-course');
    }
}
