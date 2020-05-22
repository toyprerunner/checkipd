<?
 $host="localhost";
$users="root";
$pw="root";
$dbname="smm_db";
$dbquery = mysql_connect($host,$users,$pw);
mysql_query("set NAMES utf8 ");
if (!$dbquery) {
	echo "<H3>ไม่สามารถติดต่อฐานข้อมูลได้</H3>";
	exit();
}else{
	echo "<H3>  Sucess   </H3>";
}
//HI
 
$host2="10.0.0.5";
$users2="hiuser";
$pw2="212224";
$dbname2="hi";
$mysqli_hi=new mysqli("$host2","$users2","$pw2","$dbname2");
$mysqli_hi->set_charset("utf8");

if (!$mysqli_hi) {
	echo "<H3>ไม่สามารถติดต่อฐานข้อมูลได้</H3>";
	exit();
} else{echo "99";}
 
 

 if($_SESSION[status]=='1'){

 $n_status="ผู้ดูแลระบบ";

 }
$title="Srimuangmai Hospital  :: โรงพยาบาลศรีเมืองใหม่";
$footer="กลุ่มงานยุทธศาสตร์และสารสนเทศ โรงพยาบาลศรีเมืองใหม่  ต.นาคำ  อ.ศรีเมืองใหม่  จ.อุบลราชธานี ๓๔๒๕o";
 
?>
 
<?php   

// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
function page_navigator($show,$before_p,$plus_p,$total,$total_p,$chk_page){   
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;



	if($chk_page>0){  
		echo "<a  href='$show&s_page=$pPrev' class='naviPN'>Prev</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='$show&s_page=0'>1</a><a class='SpaceC'>.  .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='$show&s_page=$i'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>.  .</a><a $nClass href='$show&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='$show&s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>.  .</a><a $nClass href='$show&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='$show&s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='$show&s_page=$i' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($chk_page<$total_p-1){
		echo "<a href='$show&s_page=$pNext'  class='naviPN'>Next</a>";
	}
}   

 function page_navigator2($show,$show2,$before_p,$plus_p,$total,$total_p,$chk_page){   
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;



	if($chk_page>0){  
		echo "<a  href='$show$show2&s_page=$pPrev' class='naviPN'>Prev</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='$show$show2&s_page=0'>1</a><a class='SpaceC'>.  .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='$show$show2&s_page=$i'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>.  .</a><a $nClass href='$show$show2&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='$show$show2&s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>.  .</a><a $nClass href='$show$show2&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='$show$show2&s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='$show$show2&s_page=$i' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($chk_page<$total_p-1){
		echo "<a href='$show$show2&s_page=$pNext'  class='naviPN'>Next</a>";
	}
}   
?>




