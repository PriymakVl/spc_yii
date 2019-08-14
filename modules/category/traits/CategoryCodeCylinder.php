<?php

namespace app\modules\category\traits;

trait CategoryCodeCylinder {

    public function getCodeCylinder($cylinder)
    {
    	$cylinder = (object) $cylinder;
    	$code = $this->createCodeCylinder($cylinder);
    	return $code;
    }

    private function createCodeCylinder($cylinder)
    {
    	$code = 'SC';
    	$code .= '-'.$this->code;
    	if ($cylinder->magneto == 'yes') $code .= '-S';
    	$code .= '-'.$cylinder->diameter.'x'.$cylinder->stroke;
    	if ($cylinder->thread_rod == 'out') $code .= '-B';
    	return $code;
    }

}