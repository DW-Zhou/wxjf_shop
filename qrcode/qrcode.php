<?php 
// 1. 生成原始的二维码(生成图片文件)
function scerweima($url=''){
  require_once 'phpqrcode/phpqrcode.php';
  $value = $url;         //二维码内容
  $errorCorrectionLevel = 'L';  //容错级别
  $matrixPointSize = 5;      //生成图片大小
  //生成二维码图片
  // 判断是否有这个文件夹  没有的话就创建一个
  if(!is_dir("qrcode")){
    // 创建文件加
    mkdir("qrcode");
  }
 /* $filename = 'qrcode/'.microtime().'.png';*/
 $filename = 'qrcode/'.$url.'.png';
  QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);
  $QR = $filename;        //已经生成的原始二维码图片文件
  $QR = imagecreatefromstring(file_get_contents($QR));
  //输出图片
  imagepng($QR, 'qrcode.png');
  imagedestroy($QR);
  return '<img src="qrcode.png" style="width:4.5rem" alt="请先注册积分会员">';
}
//调用查看结果
/*echo scerweima('骆萧');*/
 ?>