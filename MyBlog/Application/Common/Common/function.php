<?php
/**
 * 截取中文字符串
 *
 * @param [string] $str 需要截取的字符串
 * @param [int] $start 定义开始位置
 * @param [int] $length 定义截取长度
 * @param string $charset 设置字符编码,默认为utf-8
 * @param boolean $suffix 是否使用后缀,默认为true
 * @return string 返回截取后的字符串
 */
function msubstr($str,$start,$length,$charset="utf-8",$suffix=true) {
    if($suffix) {
        return mb_substr($str,$start,$length,$charset)."...";
    } else {
        return mb_substr($str,$start,$length,$charset);
    }
}




?>