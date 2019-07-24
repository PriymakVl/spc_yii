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
}