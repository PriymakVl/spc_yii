<?php

namespace app\modules\category\traits;

trait CategoryList {

	public function getMain()
    {
    	$cats = $this->getByIdParentModel(self::ID_PARENT_MAIN);
    	if ($cats) return $this->callMethods($cats, ['getChildren']);
    }

}