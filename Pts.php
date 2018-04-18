<script src= 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script><meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' /><meta name='HandheldFriendly' content='true' />
<style>
#box{
	position: absolute;
	margin: 0px auto;
	top: 0px;
	left: 0; right: 0;
	width: 90%;
	height: 250px;
	background: none;
	padding: 2px;
	text-align: center;
	line-height: 7px;
	overflow: hidden;
	box-shadow: 0px 0px 1px .3px #000;
	font-style: serif;
}
#box div{
	position: relative;
	margin: 0px auto;
	width: 99.5%;
	background: rgb(100,100,100);
	color: rgb(100,30,130);
	height: 21px;
	line-height: 21px;
	display: block;
	font-weight: bold;
	font-style: serif;
	box-shadow: 0 0 5px #000;
	text-shadow: .3px .7px #fff;
	font-style: serif;
}
#box team{
	position: absolute;
	left: 0;
	background: rgb(190,180,170);
	width: 25%;
	text-align: center;
}
#box nrr{
	position: absolute;
	right: 0;
	background: rgb(160,170,180);
	width: 25%;
	text-align: center;
}
#box win{
	position: absolute;
	margin: 0px auto;
	left: 37.5%;
	background: rgb(0,160,0);
	width: 12.5%;
	text-align: center;
}
#box point{
	position: absolute;
	margin: 0px auto;
	right: 25%;
	background: rgb(200,200,0);
	width: 12.5%;
	text-align: center;
}
#box mat{
	position: absolute;
	left: 25%;
	background: rgb(160,170,180);
	width: 12.5%;
	text-align: center;
}
#box loss{
	position: absolute;
	right: 37.5%;
	background: rgb(90,100,90);
	color: rgb(120,120,120);
	width: 12.5%;
	text-align: center;
}
</style>
<?php
echo "<div id='box'>";
$link = "http://m.cricbuzz.com/cricket-pointstable/2676/indian-premier-league-2018";
$i = implode('',file($link));
$j = substr($i,strpos($i,'<table'));
$k = substr($i,strpos($i,'</table>'));
$htmlContent = "<div id='crichunt'>".str_replace($k,"",$j)."</div>";
$name = Array("Sunrisers Hyderabad","Kings XI Punjab","Chennai Super Kings","Rajasthan Royals","Kolkata Knight Riders","Royal Challengers Bangalore","Delhi Daredevils","Mumbai Indians");
$code = Array("SRH","KXIP","CSK","RR","KKR","RCB","DD","MI");
$i = 0;
while($i<8){
$htmlContent = str_replace($name[$i],$code[$i],$htmlContent);
$i++;
}


	$DOM = new DOMDocument();
	$DOM->loadHTML($htmlContent);	
	$Header = $DOM->getElementsByTagName('td');	
	foreach($Header as $NodeHeader) 
	{
$x[] = trim($NodeHeader->textContent);
	}
$i = 0;
while($i<54){
 echo "\n<div>\n<team>".$x[$i]."</team>\n<mat>".$x[$i+1]."</mat>\n<win>".$x[$i+2]."</win>\n<loss>".$x[$i+3]."</loss>\n<point>".$x[$i+4]."</point>\n<nrr>".$x[$i+5]."</nrr>\n</div><br>";
$i = $i+6;
}
echo implode('',file($link));
echo "</div>";
?>
