<?php

namespace app\modules\category\traits;

trait CategoryList {

	public function getMain()
    {
    	$cats = $this->selectByIdParent(null);
    	if (!$cats) return;
        foreach ($cats as $cat) {
        	$cat->getChildren();
        	if (!$cat->children) continue;
        	foreach ($cat->children as $subcat) {
        		$subcat->getImage();
        	}
        }
        return $cats;
    }

}