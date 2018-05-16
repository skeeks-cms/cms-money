<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money\controllers;

use skeeks\cms\backend\controllers\BackendModelStandartController;
use skeeks\cms\money\models\MoneyCurrency;
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

        ]);
    }
}
