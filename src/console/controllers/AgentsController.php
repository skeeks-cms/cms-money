<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\money\console\controllers;

use yii\console\Controller;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AgentsController extends Controller
{
    public function actionUpdateCourses()
    {
        \Yii::$app->money->processUpdateCourses();
    }
}