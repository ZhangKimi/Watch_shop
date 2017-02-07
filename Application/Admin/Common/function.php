<?php  
    // 显示子分类
    function SidType($id){
        $Data=M('Type');
    	//$where['parid']=$parid;
    	//$list=$Data->where("`parth` = 0,".$pid)->select();
    	$list=$Data->where("`parid` = $id")->select();
    	return $list;
    }