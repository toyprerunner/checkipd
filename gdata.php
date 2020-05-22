<? ob_start();?>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false); 

error_reporting( error_reporting() & ~E_NOTICE );
include "include.con/config.inc.php";
include 'include.con/Datelibrary.php'; 
   $Dlib = new DateLib();



if($_GET['rev']==1){

echo "<div align='center'><font color='198311' size='+2'>".$Dlib->MadeDay(date('Y-m-d')) ."&nbsp;".date("H:i:s", mktime(date("H"), date("i")+0, date("s")+0, date("m")+0  , date("d")+0, date("Y")+0))."&nbsp;&nbsp;</font></div>";	

$yearz=date("Y");
$monthz=date("m");
$SQLdebt22_num_rows="SELECT  * ,MONTH(rgtdate) as rgt from ipt where YEAR(rgtdate)='$yearz' and MONTH(rgtdate)='$monthz' GROUP BY ipt.vn";
$sqlquerydebt22_num_rows=$mysqli_hi->query($SQLdebt22_num_rows);
$addnumdebt22_num_rows=$sqlquerydebt22_num_rows->num_rows;


$SQLdebt22_num_rows1="SELECT
MONTH(rgtdate) AS rgt,
iptdx.icd10,
iptdx.an,
ipt.an,
ipt.ward
FROM
ipt
INNER JOIN iptdx ON iptdx.an = ipt.an
where YEAR(rgtdate)='$yearz' and MONTH(rgtdate)='$monthz' 
and ((iptdx.icd10 not BETWEEN 'O000' and 'O999') or (iptdx.icd10='z370'))
GROUP BY ipt.vn";
$sqlquerydebt22_num_rows1=$mysqli_hi->query($SQLdebt22_num_rows1);
$addnumdebt22_num_rows1=$sqlquerydebt22_num_rows1->num_rows;


$SQLw1="SELECT  * ,MONTH(rgtdate) as rgt from ipt INNER JOIN iptdx ON iptdx.an = ipt.an where YEAR(rgtdate)='$yearz' and MONTH(rgtdate)='$monthz' and ipt.ward='01' and ((iptdx.icd10 not BETWEEN 'O000' and 'O999') or (iptdx.icd10='z370')) GROUP BY ipt.vn";
$sqlqueryw1=$mysqli_hi->query($SQLw1);
$addnumw1=$sqlqueryw1->num_rows;
 
 $SQLw2="SELECT
CONCAT(DATE_FORMAT(ovst.vstdttm,'%d'),'-',MONTH(ovst.vstdttm),'-',YEAR(ovst.vstdttm)+543) AS date,
ipt.rgtdate AS rgt,
ipt.vn,
ipt.hn,
ipt.an,
ipt.ward,
ipt.rgtdate,
ovst.dct,
ovst.cln,
cln.namecln,
iptdx.icd10,
iptdx.icd10name
FROM
ipt
INNER JOIN ovst ON ovst.vn = ipt.vn
INNER JOIN cln ON cln.cln = ovst.cln
INNER JOIN iptdx ON iptdx.an = ipt.an
where YEAR(rgtdate)='$yearz' and MONTH(rgtdate)='$monthz' and ((iptdx.icd10 NOT BETWEEN 'O000' and 'O999') or (iptdx.icd10='z370')) and ipt.ward='02'
GROUP BY ipt.vn";
$sqlqueryw2=$mysqli_hi->query($SQLw2);
$addnumw2=$sqlqueryw2->num_rows;

 $SQLw3="SELECT
CONCAT(DATE_FORMAT(ovst.vstdttm,'%d'),'-',MONTH(ovst.vstdttm),'-',YEAR(ovst.vstdttm)+543) AS date,
ipt.rgtdate AS rgt,
ipt.vn,
ipt.hn,
ipt.an,
ipt.ward,
ipt.rgtdate,
ovst.dct,
ovst.cln,
cln.namecln,
iptdx.icd10,
iptdx.icd10name
FROM
ipt
INNER JOIN ovst ON ovst.vn = ipt.vn
INNER JOIN cln ON cln.cln = ovst.cln
INNER JOIN iptdx ON iptdx.an = ipt.an
where YEAR(rgtdate)='$yearz' and MONTH(rgtdate)='$monthz' and ((iptdx.icd10   BETWEEN 'O000' and 'O999') or (iptdx.icd10='z370')) and ipt.ward='02'
GROUP BY ipt.vn";
$sqlqueryw3=$mysqli_hi->query($SQLw3);
$addnumw3=$sqlqueryw3->num_rows;
?>            


<?php
 $SQL_error="SELECT
ipt.vn,
ipt.an as an,
ipt.hn as hn,
ipt.ward as ward,
ipt.rgtdate as rgtdate ,
ipt.rgttime,
ipt.pttype,
ipt.prediag,
ipt.dchdate,
ipt.daycnt,
ipt.dchtime,
ipt.dchtype,
ipt.bmi,
ipt.bw as bw,
ipt.height as height,
ipt.ipttype,
MONTH(rgtdate) AS rgt,
pt.fname as fname ,
pt.lname as lname,
pt.male,
pttype.namepttype
FROM
ipt
INNER JOIN pt ON pt.hn = ipt.hn
INNER JOIN pttype ON pttype.pttype = ipt.pttype
where YEAR(ipt.rgtdate)='$yearz' and MONTH(ipt.rgtdate)='$monthz'  and (ipt.ward='' or ipt.bw='0' or ipt.height='0') 
GROUP BY ipt.vn order by ipt.vn desc";
$sqlquery_error=$mysqli_hi->query($SQL_error);
$addnum_error=$sqlquery_error->num_rows;

//(ipt.ward='' or ipt.bw='0' or ipt.height='0') 
?>
<table width="101%" class="table">
					<tr valign="top" >
                    <td colspan="11" class="bg-danger"><div align='center'><h1>พบความไม่สมบูรณ์ของข้อมูล <?=$addnum_error?> AN<br>  ไม่ระบุ Ward/น้ำหนัก/ส่วนสูง</h1></strong>   </DIV>                 </td>
                    </tr>
 
                  <tr>
                    <td align="center">
    <tr> 
 

</td>
     </tr>  
					<tr class="alert-success">
                    <td><div align="center"><strong>วันที่ Admit</strong></div></td>
                    <td><div align="center"><strong>HN</strong></div></td>
					<td><div align="center"><strong>AN</strong></div></td>
                      <td><div align="center"><strong>ชื่อ-สกุล</strong></div></td>
                        <td><div align="center"><strong>Ward</strong></div></td>
                          <td><div align="center"><strong>น้ำหนัก</strong></div></td>
                            <td><div align="center"><strong>ส่วนสูง</strong></div></td>
                      
                  </tr>



<?php

$i=0;
while($rs_error=$sqlquery_error->fetch_assoc()){
	if($rs_error[ward]=='01'){ $wname="1";}
	else if($rs_error[ward]=='02'){ $wname="2";}
	else{
	$wname="";
	}
 
 
		$i++;
if($i%2==0)
{
$bgcolor = "#ff0000";
}
else
{
$bgcolor = "#ff5050";
}
$ndate=date('Y-m-d');
if($rs_error[rgtdate]==$ndate){
$bgcolor1 = "#f0ff00";
}else{
$bgcolor1 = "#ffffff";
}
?>

 
                                    <tr bgcolor="<?=$bg;?>">
									                      <td class="FontMenuCHK" bgcolor="<?=$bgcolor1?>"><strong><?=$Dlib->MadeDay($rs_error[rgtdate])?></strong></td>
                    <td class="FontMenuCHK" bgcolor="<?=$bgcolor1?>"><strong><?=$rs_error[hn]?></strong></td>
					<td class="FontMenuCHK" bgcolor="<?=$bgcolor1?>"><strong><?=$rs_error[an]?></strong></td>
                    <td class="FontMenuCHK" bgcolor="<?=$bgcolor1?>"><strong><?=$rs_error[fname]?> &nbsp;<?=$rs_error[lname]?></strong></td>
					                        <td class="FontMenuCHK"  <? if($rs_error[ward]==''){ echo "bgcolor=".$bgcolor."";}else{ echo "bgcolor=".$bgcolor1."";}?>><strong><?=$wname?></strong></td>


                          <td class="FontMenuCHK"  <? if($rs_error[bw]=='0'){ echo "bgcolor='".$bgcolor."'";}else{echo  "bgcolor=".$bgcolor1."";}?>><strong><?=$rs_error[bw]?></strong></td>
                            <td class="FontMenuCHK"<? if($rs_error[height]=='0'){ echo "bgcolor=".$bgcolor."";}else{  echo "bgcolor=".$bgcolor1."";}?>><strong><?=$rs_error[height]?></strong></td>
                              


                  </tr>         
 <? } ?>
              
</table>
 <? }  
 
			 ?> 





 
 