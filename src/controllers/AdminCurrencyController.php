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
                        'active'   => SORT_DESC,
                        'priority' => SORT_ASC,
                    ],
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'id',
                        'code',
                        'name',
                        'course',
                        'active',
                        'priority',
                    ],
                    'columns'        => [
                        'active' => [
                            'class' => BooleanColumn::class,
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
                'class' => BackendModelMultiActivateAction::class,
            ],

            "deactivate-multi" => [
                'class' => BackendModelMultiDeactivateAction::class,
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
            'name_full',
            'active'   => [
                'class'      => BoolField::class,
                'trueValue'  => "Y",
                'falseValue' => "N",
            ],
            'course',
            'priority',
        ];
    }

    public function actionUpdateAll()
    {
        if (\Yii::$app->request->isPost) {
            foreach (\skeeks\modules\cms\money\Currency::$currencies as $code => $data) {
                $currency = new \skeeks\modules\cms\money\Currency($code);

                if (!$currencyModel = Currency::find()->where(['code' => $code])->one()) {
                    $currencyModel = new Currency([
                        'code' => $code,
                        'active' => Cms::BOOL_N,
                        'name_full' => $currency->getDisplayName(),
                        'name' => $currency->getDisplayName(),
                    ]);

                    $currencyModel->save(false);
                } else {
                    if (!$currencyModel->name) {
                        $currencyModel->name = $currency->getDisplayName();
                    }

                    if (!$currencyModel->name_full) {
                        $currencyModel->name_full = $currency->getDisplayName();
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
