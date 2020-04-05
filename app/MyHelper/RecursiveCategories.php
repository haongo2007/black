<?php
/*
|--------------------------------------------------------------------------
| Ajax Helper
|--------------------------------------------------------------------------
|
| This class will help get data from database with have or not have relation
| Author: Duy Huynh
|
*/
namespace App\Myhelper;

class RecursiveCategories{

    public static function data_tree($data,$parent=0,$level=0){
        $result = [];
        foreach ($data as $key => $value) {
            if ($value['parent'] == $parent ) {
                $value['level'] = $level;
                $result[] = $value;
                unset($data[$value['id']]);
                $child = RecursiveCategories::data_tree($data,$value['id'],$level + 1);
                $result = array_merge($result,$child);
            }
        }
        return $result;
    }
}
