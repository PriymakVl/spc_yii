<?php

namespace app\modules\category\traits;

trait CategoryList {

	public function getMain()
    {
    	$cats = $this->getByIdParentModel(self::ID_PARENT_MAIN);
    	if ($cats) return $this->callMethods($cats, ['getChildren']);
    }

    public function selectMain()
    {
    	//$id_parent = ($id_parent === false) ? $this->id_parent : $id_parent; 
    	return self::find()->where(['IBLOCK_SECTION_ID' => null])->asArray()->all();
    }

}