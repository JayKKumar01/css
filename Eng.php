<?php
	$val = $_GET['val'];
	$seq = $val-(intval($val/100000)*100000);
	$txt1 = "#EXTM3U\n#EXT-X-VERSION:3\n#EXT-X-TARGETDURATION:4\n#EXT-X-PLAYLIST-TYPE:VOD\n#EXT-X-MEDIA-SEQUENCE:$seq";
	$link = $_GET['link'];
	$ts1 = "*".intval($val);
	$ts2 = "*".intval($val+1);
	$ts3 = "*".intval($val+2);
	$ts4 = "*".intval($val+3);
	$ts5 = "*".intval($val+4);
	$bit = Array("1","2","3","4","5","6","7");
	$i = 0;
while($i<8){
$txt2 = "\n#EXTINF:4.000,\n".$link."/master_Layer".$bit[$i]."/master_Layer".$bit[$i]."_".str_replace("*1","","$ts1").".ts";
$txt3 = "\n#EXTINF:4.000,\n".$link."/master_Layer".$bit[$i]."/master_Layer".$bit[$i]."_".str_replace("*1","","$ts2").".ts";
$txt4 =  "\n#EXTINF:4.000,\n".$link."/master_Layer".$bit[$i]."/master_Layer".$bit[$i]."_".str_replace("*1","","$ts3").".ts";
$txt5 = "\n#EXTINF:4.000,\n".$link."/master_Layer".$bit[$i]."/master_Layer".$bit[$i]."_".str_replace("*1","","$ts4").".ts";
$txt6 = "\n#EXTINF:4.000,\n".$link."/master_Layer".$bit[$i]."/master_Layer".$bit[$i]."_".str_replace("*1","","$ts5").".ts";
$content = "$txt1$txt2$txt3$txt4$txt5$txt6";
$fileLocation = "ENG/".$bit[$i].".m3u8";
  $file = fopen($fileLocation,"w"); 
  fwrite($file,$content);
  fclose($file);
  $i = $i+1;
  }
 ?>