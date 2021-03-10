<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Values comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 */

namespace AlicFeng\Kubernetes\Helper;

class NetworkHelper
{
    /**
     * @function    chunkedDecode
     * @description 解码 http chunked 数据.
     * @param string $data 需要解码的字符串数据
     * @return string chunked
     * @author      AlicFeng
     * @datatime    20-7-23 下午5:28
     */
    public static function chunkedDecode($data): string
    {
        list($pos, $package) = [0, ''];
        while ($pos < strlen($data)) {
            // chunk部分(不包含CRLF)的长度,即"chunk-size [ chunk-extension ]"
            $len = strpos($data, PHP_EOL, $pos) - $pos;
            // 截取"chunk-size [ chunk-extension ]"
            $str = substr($data, $pos, $len);
            // 移动游标
            $pos += $len + 1;
            // 按;分割,得到的数组中的第一个元素为chunk-size的十六进制字符串
            $arr = explode(';', $str, 2);
            // 将十六进制字符串转换为十进制数值
            $len = hexdec($arr[0]);
            // 截取chunk-data
            $package .= substr($data, $pos, $len);
            // 移动游标
            $pos += $len + 2;
        }

        return $package;
    }
}
