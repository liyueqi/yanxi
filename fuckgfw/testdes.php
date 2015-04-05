<?php
/*
 * rc4加密算法
 * $pwd 密钥
 * $data 要加密的数据
 */
$str = "qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqeweeeeeeeeeeeeeeeeee";
$key = "8fe5fc78a95fbde89b7fa300be95fb47";
$encode = rc4($key,$str);

$x = base64_encode($encode);
$y = base64_decode($x);
$decode = rc4($key,$encode);
echo $str."|".$encode."|".$x."|".$y."|".$decode;
function rc4 ($pwd, $data)//$pwd密钥　$data需加密字符串
{
    $key[] ="";
    $box[] ="";

    $pwd_length = strlen($pwd);
    $data_length = strlen($data);
    $cipher = "";

    for ($i = 0; $i < 256; $i++)
    {
        $key[$i] = ord($pwd[$i % $pwd_length]);
        $box[$i] = $i;
    }

    for ($j = $i = 0; $i < 256; $i++)
    {
        $j = ($j + $box[$i] + $key[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for ($a = $j = $i = 0; $i < $data_length; $i++)
    {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;

        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;

        $k = $box[(($box[$a] + $box[$j]) % 256)];
        $cipher .= chr(ord($data[$i]) ^ $k);
    }

    return $cipher;
}

?>