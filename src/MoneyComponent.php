<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money;

use skeeks\cms\base\Component;

/**
 * @property string currencyCode;
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class MoneyComponent extends Component
{
    public function getCurrencyCode()
    {
        return \Yii::$app->formatter->currencyCode;
    }
}