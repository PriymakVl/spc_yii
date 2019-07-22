<?php

namespace app\modules\category\traits;

use app\models\Filter;

trait CategoryConvert {

    public function convertFiltersToList()
    {
        $filters = $this->getFilters();
        if (!$filters) return;
        $this->filters_list = '<ol>';
        foreach ($filters as $name) {
            $filter = (new Filter)->selectByName($name);
            $this->filters_list .= '<li>'.$filter->title.'</li>';
        }
        $this->filters_list .= '</ol>';
        return $this;
    }
}