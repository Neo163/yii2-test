<?php

namespace frontend\models;

use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

class Supplier extends ActiveRecord
{
    /**
     * 操作的表名称F
     */
    public static function tableName()
    {
        return '{{%supplier}}';
    }

    /**
     * 字段设置规则
     */
    public function rules()
    {
        return [
            [['id', 'name', 'code', 't_status'], 'string'],
        ];
    }

    /**
     * 搜索
     */
    public function search($params)
    {
        $query = self::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'p',
                'pageSizeParam' => 'pageSize',
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
                'attributes' => [
                    'id', 'name', 'code', 't_status',
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['t_status' => $this->t_status]);

        if ($this->id == '<') {
            $query->andFilterWhere(['<', 'id', '10']);
        } elseif ($this->id == '<=') {
            $query->andFilterWhere(['<=', 'id', '10']);
        } elseif ($this->id == '>') {
            $query->andFilterWhere(['>', 'id', '10']);
        } elseif ($this->id == '>=') {
            $query->andFilterWhere(['>=', 'id', '10']);
        }

        return $provider;
    }
}
