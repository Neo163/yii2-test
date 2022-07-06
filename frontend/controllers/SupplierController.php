<?php

namespace frontend\controllers;

use YII;
use frontend\models\Supplier;
use yii\web\Controller;

class SupplierController extends Controller
{
    /**
     * 导出列表.
     */
    public function actionExport()
    {
        $ids = Yii::$app->request->get('ids');
        if (empty($ids)) {
            return '<center><h1>没有选中导出的数据</h1></center>';
        }
        $arrId = empty($ids) ? [] : explode(',', $ids);

        $title = 'Id,Name,Code,Status' . "\n";
        $fileName = '数据' . date('Ymd') . '.csv';

        // 列表
        $dataArr = Supplier::find()
            ->andFilterWhere(['in', 'id', $arrId])
            ->asArray()->all();

        $wrstr = '';
        if (!empty($dataArr)) {
            foreach ($dataArr as $key => $value) {
                $wrstr .= $value['id'];
                $wrstr .= ',' . $value['name'];
                $wrstr .= ',' . $value['code'];
                $wrstr .= ',' . $value['t_status'];
                $wrstr .= "\n";
            }
        }

        $this->Csvexport($fileName, $title, $wrstr);
    }

    /**
     * 导出内容.
     */
    public function Csvexport($file = '', $title = '', $data = '')
    {
        header("Content-Disposition:attachment;filename=" . $file);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        // ob_start();

        //表头
        $wrstr = $title;

        //内容
        $wrstr .= $data;

        $wrstr = iconv("utf-8", "GBK//ignore", $wrstr);

        // ob_end_clean();

        echo $wrstr;
    }
}
