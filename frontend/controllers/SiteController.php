<?php

namespace frontend\controllers;

use YII;
use frontend\models\Supplier;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $user = new Supplier();
        // 调用模型搜索方法并传入get参数
        $provider = $user->search(YII::$app->request->get());

        return $this->render('supplier', [
            'model' => $user,
            'provider' => $provider,
        ]);
    }
}
