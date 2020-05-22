<?
class DateLib {
function MadeDay($arg1){
 $made_on = date_parse($arg1);

$made1=$made_on["day"];
$made2=$made_on["month"];
$made3=$made_on["year"]+543;
 

$ret = "";

if($made_on["month"]==1){
        $ref='ม.ค.';
		$made2=01;
}else if ($made_on["month"]==2){
	  $ref='ก.พ.';
	  $made2=02;
}else if ($made_on["month"]==3){
	  $ref='มี.ค.';
	  $made2=03;
}else if ($made_on["month"]==4){
	  $ref='เม.ย.';
	  $made2=04;
}else if ($made_on["month"]==5){
	  $ref='พ.ค.';
	  $made2=05;
}else if ($made_on["month"]==6){
	  $ref='มิ.ย.';
	  $made2=06;
}else if ($made_on["month"]==7){
	  $ref='ก.ค.';
	  $made2=07;
}else if ($made_on["month"]==8){
	  $ref='ส.ค.';
	  $made2=08;
}else if ($made_on["month"]==9){
	  $ref='ก.ย.';
	  $made2=09;
}else if ($made_on["month"]==10){
	  $ref='ต.ค.';
	  $made2=10;
}else if ($made_on["month"]==11){
	  $ref='พ.ย.';
	  $made2=11;
}else if ($made_on["month"]==12){
	  $ref='ธ.ค.';
	  $made2=12;
}

$ref1 = "".$made1." ".$ref." ".$made3." ";

return $ref1;
}//end func
function MadeDay2($arg1){
 $made_on = date_parse($arg1);

$made1=$made_on["day"];
$made2=$made_on["month"];
$made3=$made_on["year"]+543;
 

$ret = "";

if($made_on["month"]==1){
        $ref='ม.ค.';
		$made2=01;
}else if ($made_on["month"]==2){
	  $ref='ก.พ.';
	  $made2=02;
}else if ($made_on["month"]==3){
	  $ref='มี.ค.';
	  $made2=03;
}else if ($made_on["month"]==4){
	  $ref='เม.ย.';
	  $made2=04;
}else if ($made_on["month"]==5){
	  $ref='พ.ค.';
	  $made2=05;
}else if ($made_on["month"]==6){
	  $ref='มิ.ย.';
	  $made2=06;
}else if ($made_on["month"]==7){
	  $ref='ก.ค.';
	  $made2=07;
}else if ($made_on["month"]==8){
	  $ref='ส.ค.';
	  $made2=08;
}else if ($made_on["month"]==9){
	  $ref='ก.ย.';
	  $made2=09;
}else if ($made_on["month"]==10){
	  $ref='ต.ค.';
	  $made2=10;
}else if ($made_on["month"]==11){
	  $ref='พ.ย.';
	  $made2=11;
}else if ($made_on["month"]==12){
	  $ref='ธ.ค.';
	  $made2=12;
}

$ref1 = "".$ref." ".$made3." ";

return $ref1;
}//end func
}//end class

?>