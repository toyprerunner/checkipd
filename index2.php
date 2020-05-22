<?error_reporting( error_reporting() & ~E_NOTICE );
session_start();
set_time_limit(0);

include "include.con/config.inc.php";
include "car.php";
?>
<?php include 'include.con/Datelibrary.php';?>
    <?php
   $Dlib = new DateLib();
   
  ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<meta name="robots" content="index, follow" />
<meta name="keywords" content=""/>
<meta name="description" content=""/>


<link href="images/stylesheet.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="editor/ed.js"></script>  
 
 <style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>


<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
 
background-color: #FFF;
font: 100.01% "Trebuchet MS",Verdana,Arial,sans-serif
}
-->
</style>
 

</head>


<body marginheight="0"  marginwidth="0">
<table width="90%"  border="0" cellspacing="0" cellpadding="0" align="center" class="dotted">
<tr>
  <td   >  
<?php include "header.php"; ?>
 </td>
</tr>
<tr>
<td>
<?// include "menu.php";?>
<table width="100%" height="100%" border=0 cellpadding="0" cellspacing="0"  >
  <tbody>

    <tr>
      <td valign="top" bgcolor=#ffffff>  
          <?
 if($_GET[menu]=="m"){
 
	 include "board.php";  echo "<BR>";

			   }else if($_GET[menu]=="log"){
	 include "frm_log.php";  echo "<BR>";
			   }else if($_GET[menu]=="admin"){
 
	 include "board2.php";  echo "<BR>";
 
  
			   }else{
	 include "board.php";  echo "<BR>"; 
 
			   }
 
?>    <BR>

 
  </td>
    </tr>
  </tbody>
</table></td>
</tr>
  <script type="text/javascript">
function expand_img_footer(Obj)
{
    Obj.style.width = "34px";
    Obj.style.height= "34px";
}
</script>
  <script type="text/javascript">
function expand_img2_footer(Obj)
{
    Obj.style.width = "32px";
    Obj.style.height= "32px";
}
</script>


</table>
<table width="90%" border="0" align="center" class="dotted">
<tr>
<td height="50" align="right" bgcolor="#05549f"><font color="#FFFFFF">
  <div class="FontMenu"><br><br>‚√ßæ¬“∫“≈ «Ë“ß«’√–«ß»Ï<br>
  &nbsp;&nbsp;&nbsp;&nbsp;</div></font> </td>
</tr>
</table>

</body>
</html>

