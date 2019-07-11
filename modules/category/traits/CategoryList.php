<?php

namespace app\modules\category\traits;

trait CategoryList {

	public function getMain()
    {
    	$cats = $this->selectByIdParent(null);
        $cats = $this->callMethods($cats, ['getChildren']);
        if ($cats->children) $cats->children = $this->callMethods($cats->children, ['getImage']);
        return $cats;
    }

}