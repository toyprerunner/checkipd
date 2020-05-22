<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title?></title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="jquery-ui.css" rel="stylesheet" type="text/css">
<style type="text/css">
@import url(fonts/thsarabunnew.css);
html{overflow-y:scroll;}
body{
    font-family: 'THSarabunNew', sans-serif; font-size: 1.5em; 
    background-color:#f1f1f1;
}
</style>

</head>
<body>  	 
	<table class="table">
		<tr>
			<td>
				<div align=left><img src="iconset/user.png"/> [ Admin Area ]   
                </div>                
			</td>
		</tr>
<table width="100%" class="table">
<form name="checkForm" onSubmit="return check()"   method="POST" enctype="multipart/form-data"   >
	<tr>
		<td>
			<div align="center"><br/>ระบุช่วงวันที่  	 
                  <input name="dateInput" type="text" id="dateInput" value="" readonly/> ถึง&nbsp; 	<input name="dateoutput" type="text" id="dateoutput" value="" readonly/>
                      &nbsp;<br><br>
                      <input type="submit" name="button2" id="button2" value="ประมวลผลข้อมูล" class='myButton' />
                         <input type="hidden" name="chk" id="button2" value="1" class='myButton' />
                      <br/>
                  <br/>
			</div>   
</form>  
		<?php
            $di=explode('-',$_POST[dateInput]);
            $di2=$di[2]-543;
            $di3=$di2."-".$di[1]."-".$di[0];
            $do=explode('-',$_POST[dateoutput]);
            $do2=$do[2]-543;
            $do3=$do2."-".$do[1]."-".$do[0];
            if($_POST[chk]=='1'&&$_POST[dateInput]<=$_POST[dateoutput]){ ?>             
            <div align="center">ค้นหาวันที่ <?=$Dlib->MadeDay($di3)?>&nbsp;ถึง&nbsp;<?=$Dlib->MadeDay($do3)?><? }else if($_POST[chk]=='1'&&$_POST[dateInput]>$_POST[dateoutput]){ echo "<DIV align='center'>ผิดพลาด!! วันที่ ไม่ถูกต้อง</div>"; }?>
            <br />
            <br />
            </div>
                    
		</td>
	</tr>         
					<?	if($_POST[chk]=='1'&&$_POST[dateInput]<=$_POST[dateoutput]){ ?>             
<div align='center'><a href='PHPExcel/er1_to_excel.php?date_a=<?=$di3?>&date_b=<?=$do3?>' target='_blank'><h2><font color=white><span class="alert-danger">Excel DOWNLOAD..</span></font></h2></a></div>
                    <? }
                         if($_POST[chk]=='1'&&$_POST[dateInput]<=$_POST[dateoutput]){
						 



						$q_nameop="SELECT
ipt.an as an,
ipt.hn as hn,
ipt.ward as ward,
ipt.rgtdate as rgtdate,
ipt.rgttime as rgttime,
pttype.namepttype as namepttype,
ipt.prediag as prediag,
ipt.dchdate as dchdate,
iptdx.icd10 as icd10,
ovst.dct AS DOC_ADMID 
FROM
ipt
INNER JOIN iptdx ON iptdx.an = ipt.an
INNER JOIN ovst ON ovst.vn = ipt.vn
INNER JOIN pttype ON pttype.pttype = ipt.pttype
where (DATE(rgtdate) between ('$di3') and ('$do3')) and ((iptdx.icd10 not BETWEEN 'O000' and 'O999') or (iptdx.icd10='z370'))
GROUP BY ipt.vn limit 1,10";
 
 
		  				$qr_nameop=$mysqli_hi->query($q_nameop);
						$qr_nameop_total=$qr_nameop->num_rows;
						 if($qr_nameop_total<1){
						 echo "<DIV align='center'><h1><font color='red'>ไม่พบข้อมูล!</font></h1></div>";
						 }else{
					?>
                    <table class="table table-striped">
<tr class="alert-success">
                    <td>
                    <DIV align="center"><strong>AN</strong></DIV>					</td>
					 <td>
                    <DIV align="center"><strong>HN</strong></DIV>					</td>
					 <td>
                    <DIV align="center"><strong>วอร์ด</strong></DIV>					</td>	 
                
					 <td>
                    <DIV align="center"><strong>วันที่แอดมิด/เวลา</strong></DIV>					</td>	 
										 <td>
                    <DIV align="center"><strong>สิทธิ</strong></DIV>					</td>	 
										 <td>
                    <DIV align="center"><strong>DX</strong></DIV>					</td>	 
										 <td>
                    <DIV align="center"><strong>Dischart</strong></DIV>					</td>	 
										 <td>
                    <DIV align="center"><strong>ICD10</strong></DIV>					</td>	 
					 <td>
                    <DIV align="center"><strong>แพทย์ Admit</strong></DIV>					</td>	 
                    </tr>

<? 

	 					 while($rs_nameop=$qr_nameop->fetch_assoc()){
?>
<tr>
<td align="center" ><div><?=$rs_nameop[an]?></div></td>
<td  align="center" ><div><?=$rs_nameop[hn]?></div></td>
<td  align="center" ><div><?=$rs_nameop[ward]?></div></td>
 <td  align="center" ><div><?=$rs_nameop[rgtdate]?>/<?=$rs_nameop[rgttime]?></div></td>
   <td><div><?=$rs_nameop[namepttype]?></div></td>
    <td  align="center" ><div><?=$rs_nameop[prediag]?></div></td>
	 <td  align="center" ><div><?=$rs_nameop[dchdate]?></div></td>
	  <td  align="center" ><div><?=$rs_nameop[icd10]?></div></td>
	   <td  align="center" ><div><?=$rs_nameop[DOC_ADMID]?></div></td>


                  </tr>
				  
	<?php
		}}}
    ?>
</table>
</tabel>
<script>
function check() {
if(document.checkForm.job_start.value=="") {
alert("!!เลือกวันที่เริ่มต้น") ;
document.checkForm.job_start.focus() ;
return false ;
	}
	if(document.checkForm.job_end.value=="") {
alert("!!เลือกวันที่สิ้นสุด") ;
document.checkForm.job_end.focus() ;
return false ;
	}
}
</script>
</body>
</html>