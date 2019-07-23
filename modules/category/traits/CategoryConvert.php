<?php

namespace app\modules\category\traits;

use app\models\Filter;
use yii\helpers\ArrayHelper;

trait CategoryConvert {

    public function convertFiltersToList()
    {
        $filters = (new Filter)->selectByIdCategory($this->id);
        debug($filters);
        if (!$filters) return;
        $this->filters_list = '<ol>';
        foreach ($filters as $name) {
            $filter = (new Filter)->selectByName($name);
            $this->filters_list .= '<li>'.$filter->title.'</li>';
        }
        $this->filters_list .= '</ol>';
        return $this;
    }

    public function convertForSelectMain()
    {
        $params = ['id_parent' => null, 'status' => self::STATUS_ACTIVE];
        return self::find()->select(['name'])->where($params)->asArray()->indexBy('id')->column();
    }
}