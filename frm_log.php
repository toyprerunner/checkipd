    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css" />
<style type="text/css">
<!–
.username {
 
background-image: url(images/user.gif);
 
background-repeat: no-repeat;
 
padding-left: 20px;
}
.password {
background-image: url(images/pass.gif);
background-repeat: no-repeat;
padding-left: 20px;

}
.userx {
background-image: url(images/user.gif);
background-repeat: no-repeat;
padding-left: 20px;

}
–>
</style>
<body onload = "document.checkFormLOG.txt_username.focus()";>
<div class="container" style="margin-top:30px">
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-body">
      <span><i class="fa fa-user-secret"></i> เข้าสู่ระบบ</span>
        <form name=checkFormLOG onSubmit="return check_LOG()" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
              <input type="username" class="form-control" name="txt_username" id="exampleInputEmail1"
                placeholder="รหัสแพทย์">
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="sr-only">Password</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
              <input type="password" class="form-control" name="txt_password" id="exampleInputPassword1"
                placeholder="เลขบัตรประชาชน 3 ตัว ท้าย">
            </div>
          </div>
            <input  type=hidden value='login' name='login'>
            <input type=submit value=เข้าสู่ระบบ name='Submit2' class="btn btn-success"/>
        </form>
      </div>
    </div>
  </div>
</div>
 <?php
 if($_POST[login]=='login'){
 
 

    $SQLs="SELECT * FROM  `dct`  WHERE `dct`='$_POST[txt_username]'  AND SUBSTR(`cid`,11,13)='$_POST[txt_password]'"; 
			$qqer =$mysqli_hi->query($SQLs);
			$NumRows = $qqer ->num_rows;
			$rs=$qqer->fetch_assoc();

   

 if($NumRows>="1"){ 
 
 
				session_start();
				$_SESSION["sess_userlogipt"]="".$rs[fname]."&nbsp;".$rs[lname]."";
				$_SESSION["sess_idipt"]=$rs[dct];
  
print"<div align=center class=FontMenuLogin><img src='images/18.gif'><br>กำลังเข้าสู่ระบบ..  </div>";  
 print"<meta http-equiv=\"refresh\" content=\"1;URL=?menu=admin\">\n";


 }else{
print"<div align=center  class=FontMenuLogin><img src='images/18.gif'><br>ไม่พบผู้ใช้..</div>";

 print"<meta http-equiv=\"refresh\" content=\"1;URL=?menu=m\">\n";
 }
 }
 ?>
                       </body>
                        <SCRIPT>
function check_LOG() {
if(document.checkFormLOG.txt_username.value=="") {
alert("กรอกชื่อผู้ใช้งาน") ;
document.checkFormLOG.txt_username.focus() ;
return false ;
}
if(document.checkFormLOG.txt_password.value=="") {
alert("กรอกรหัสผ่าน") ;
document.checkFormLOG.txt_password.focus() ;
return false ;
}
else 
return true ;
}
 </SCRIPT>