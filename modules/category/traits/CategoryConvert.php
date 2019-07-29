<?php

namespace app\modules\category\traits;

use app\modules\filter\Filter;
use yii\helpers\ArrayHelper;

trait CategoryConvert {

    public function convertFiltersToList()
    {
        if (!$this->filters) return;
        $list = '<ol>';
        foreach ($this->filters as $filter) {
            $list .= '<li>'.$filter->title.'</li>';
        }
        return $list .= '</ol>';
    }

    public function convertForSelectMain()
    {
        $params = ['id_parent' => null, 'status' => self::STATUS_ACTIVE];
        return self::find()->select(['name'])->where($params)->asArray()->indexBy('id')->column();
    }

    public function convertForSelectMainWithSubcategory()
    {
        $params = ['id_parent' => null, 'status' => self::STATUS_ACTIVE];
        $main = self::find()->select(['id', 'name'])->where($params)->asArray()->all();
        for ($i = 0; $i < count($main); $i++) {
            $subcategories = self::find()->select(['name'])->where(['id_parent' => $main[$i]['id'], 'status' => self::STATUS_ACTIVE])->asArray()->indexBy('id')->column();
            if ($subcategories) $result[$main[$i]['name']] = $subcategories;
            else $result[$main[$i]['id']] = $main[$i]['name'];
        }
        return $result;
    }
}