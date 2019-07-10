<?php

namespace app\modules\category\traits;

trait CategoryList {

	public function getMain()
    {
    	$cats = $this->selectByIdParent(null);
        return $this->callMethods($cats, ['getChildren']);
    }

}