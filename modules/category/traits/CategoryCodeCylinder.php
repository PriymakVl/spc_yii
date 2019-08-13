<?php

namespace app\modules\category\traits;

trait CategoryCodeCylinder {

    public function getCodeCylinder($cylinder)
    {
    	$cylinder = (object) $cylinder;
    	$code = 'SC-'.$this->code.'-'.$cylinder->diameter.'x'.$cylinder->length;
    	return $code;
    }

}