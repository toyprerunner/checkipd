<?php error_reporting( error_reporting() & ~E_NOTICE );
session_start();
set_time_limit(0);

include "include.con/config.inc.php";
include "car.php";
?>
<?php include 'include.con/Datelibrary.php';?>
<?php
   $Dlib = new DateLib();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title?></title>
<link rel="stylesheet" href="style.css" />
<link href="images/stylesheet.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="editor/ed.js"></script>  
<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css" media="all">
</head>
<div class="container">
<div class="row">

<body marginheight="0"  marginwidth="0">
<table class="table">
<tr>
<td>  
<?php include "header.php"; ?>
</td>
</tr>
<tr>
<td>
<?// include "menu.php";?>
<table class="table table-striped">
  <tbody>
    <tr>
      <td valign="top">  
<?php
 if($_GET[menu]=="m"){
	 include "board.php";  echo "<br>";
		}else if($_GET[menu]=="log"){
	 include "frm_log.php";  echo "<br>";
		}else if($_GET[menu]=="admin"){
	 include "board2.php";  echo "<br>";
		}else{
	 include "board.php";  echo "<br>"; 
		}
?>   
<br>
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
<table class="table">
<tr>
<td height="50" align="right" bgcolor="#05549f"><font color="#FFFFFF">
<div><br><br>Sawangweerawong Hospital<br>
 ipd check data&nbsp;&nbsp;&nbsp;&nbsp;</div></font> </td>
</tr>
</table>
</div>
</div>
</body>
</html>