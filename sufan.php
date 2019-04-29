<?php
/**
 * Created by PhpStorm.
 * User: black
 * Date: 2019-02-28
 * Time: 09:43
 */

/**
 * 二分查找
 * @param $num
 * @param $arr
 */
function bin_search($num, $arr){

}

/**
 * 快排
 * @param $arr
 */
function quick_sort($arr){

}

/**
 * 冒泡排序
 * @param $arr
 */
function bubble_sort($arr){
    $len = count($arr);

    for($i=0;$i<$len;$i++){
        for($j=0;$j<$len-$i;$j++){
            if($arr[$j] > $arr[$j+1]){
                $temp = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }

    return $arr;
}

function select_sort($arr){

}
