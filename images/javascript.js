<!--
//***********************************************************
function check_userpass() {
e_k=event.keyCode
if ((e_k < 13) || (e_k >13 && e_k < 45) || (e_k > 45 && e_k < 48) || (e_k > 57 && e_k < 65) || (e_k > 90 && e_k < 95) || (e_k > 95 && e_k < 97) || (e_k > 122)) {
event.returnValue = false;
alert("ต้องเป็นตัวอักษรภาษาอังกฤษ, ตัวเลข, เครื่องหมาย \"-\", เครื่องหมาย \"_\" เท่านั้น  \nและห้ามมีการเว้นวรรคเด็ดขาด กรุณาตรวจสอบข้อมูลของท่านอีกครั้ง... \nMust be at letters(a-z, A-Z), number (0-9), \"-\" sign, \"_\" sign, but no space \nPlease enter your information again...");
}
}
//***********************************************************
function check_number() {
e_k=event.keyCode
if ((e_k < 48) || (e_k > 57)) {
event.returnValue = false;
alert("ต้องเป็นตัวเลขเท่านั้น กรุณาตรวจสอบข้อมูลของท่านอีกครั้ง...\nMust be at Number Please enter your information again...");
}
}   
//***********************************************************
function idcardinput(obj)
{
var tt = new String("");
var nm = new String("");
tt = obj.value;

nm = obj.id;
nm = nm.slice(0,nm.length - 1) + (parseInt(nm.slice(nm.length - 1,nm.length))+1);

if (tt.length  == obj.maxLength)
{
try
{
document.all.item(nm).focus();
document.all.item(nm).select();

}
catch(ex)
{}
}
}
//***********************************************************
function numofdate(dayget)
{
	var i;
	document.write("<SELECT NAME="+dayget+" SIZE='1' CLASS='TopMenuBarRight'>");
	document.write("<OPTION VALUE=0>-วันที่-</OPTION>");
	for(i=1;i<=31;i++)
	{
		document.write("<OPTION VALUE="+i+">"+i+"</OPTION>");
	}
	document.write("</SELECT> ")
	
}
//*********************************************************
function numofmonth(monthget)
{
	document.write("<SELECT NAME="+monthget+" SIZE=1 CLASS=TopMenuBarRight>");
	document.write("<OPTION VALUE=0>-เดือน-</OPTION>");
	document.write("<OPTION VALUE=1>มกราคม</OPTION><OPTION VALUE=2>กุมภาพันธ์</OPTION>");
	document.write("<OPTION VALUE=3>มีนาคม</OPTION><OPTION VALUE=4>เมษายน</OPTION>");
	document.write("<OPTION VALUE=5>พฤษภาคม</OPTION><OPTION VALUE=6>มิถุนายน</OPTION>");
	document.write("<OPTION VALUE=7>กรกฎาคม</OPTION><OPTION VALUE=8>สิงหาคม</OPTION>");
	document.write("<OPTION VALUE=9>กันยายน</OPTION><OPTION VALUE=10>ตุลาคม</OPTION>");
	document.write("<OPTION VALUE=11>พฤศจิกายน</OPTION><OPTION VALUE=12>ธันวาคม</OPTION>");
	document.write("</SELECT> ");
}
//***********************************************************
function numofyear(yearget,minus)
{
	var i,start,end;
	CurrentDate=new Date();
	start=CurrentDate.getYear()+543;
	end=start-minus;
	if(minus==6)
	{	
		start=start+6;
	}

	document.write("<SELECT NAME="+yearget+" SIZE='1' CLASS='TopMenuBarRight'>");
	document.write("<OPTION VALUE=0>-ปี-</OPTION>");
	for(i=start;i>=end;i--)
	{
		document.write("<OPTION VALUE="+i+">"+i+"</OPTION>");
	}
	document.write("</SELECT> ")
	
}
//*********************************************************
function numofchangwat(changwatget)
{
	
	document.write("<SELECT NAME="+changwatget+" CLASS=TopMenuBarRight ID=address3>");
	document.write("<OPTION VALUE=0>-จังหวัด-</OPTION>");
	document.write("<OPTION VALUE=1>กระบี่</OPTION>");
	document.write("<OPTION VALUE=2>กรุงเทพมหานคร</OPTION>");
	document.write("<OPTION VALUE=3>กาญจนบุรี</OPTION>");
	document.write("<OPTION VALUE=4>กาฬสินธุ์</OPTION>");
	document.write("<OPTION VALUE=5>กำแพงเพชร</OPTION>");
	document.write("<OPTION VALUE=6>ขอนแก่น</OPTION>");
	document.write("<OPTION VALUE=7>จันทบุรี</OPTION>");
	document.write("<OPTION VALUE=8>ฉะเชิงเทรา</OPTION>");
	document.write("<OPTION VALUE=9>ชลบุรี</OPTION>");
	document.write("<OPTION VALUE=10>ชัยนาท</OPTION>");
	document.write("<OPTION VALUE=11>ชัยภูมิ</OPTION>");
	document.write(" <OPTION VALUE=12>ชุมพร</OPTION>");
	document.write("<OPTION VALUE=13>เชียงราย</OPTION>");
	document.write("<OPTION VALUE=14>เชียงใหม่</OPTION>");
	document.write("<OPTION VALUE=15>ตรัง</OPTION>");
	document.write("<OPTION VALUE=16>ตราด</OPTION>");
	document.write("<OPTION VALUE=17>ตาก</OPTION>");
	document.write("<OPTION VALUE=18>นครนายก</OPTION>");
	document.write("<OPTION VALUE=19>นครปฐม</OPTION>");
	document.write("<OPTION VALUE=20>นครพนม</OPTION>");
	document.write("<OPTION VALUE=21>นครราชสีมา</OPTION>");
	document.write("<OPTION VALUE=22>นครศรีธรรมราช</OPTION>");
	document.write("<OPTION VALUE=23>นครสวรรค์</OPTION>");
	document.write(" <OPTION VALUE=24>นนทบุรี</OPTION>");
	document.write("<OPTION VALUE=25>นราธิวาส</OPTION>");
	document.write("<OPTION VALUE=26>น่าน</OPTION>");
	document.write("<OPTION VALUE=27>บุรีรัมย์</OPTION>");
	document.write("<OPTION VALUE=28>ปทุมธานี</OPTION>");
	document.write("<OPTION VALUE=29>ประจวบคีรีขันธ์</OPTION>");
	document.write(" <OPTION VALUE=30>ปราจีนบุรี</OPTION>");
	document.write("<OPTION VALUE=31>ปัตตานี</OPTION>");
	document.write("<OPTION VALUE=32>พระนครศรีอยุธยา</OPTION>");
	document.write("<OPTION VALUE=33>พะเยา</OPTION>");
	document.write("<OPTION VALUE=34>พังงา</OPTION>");
	document.write("<OPTION VALUE=35>พัทลุง</OPTION>");
	document.write("<OPTION VALUE=36>พิจิตร</OPTION>");
	document.write("<OPTION VALUE=37>พิษณุโลก</OPTION>");
	document.write("<OPTION VALUE=38>เพชรบุรี</OPTION>");
	document.write("<OPTION VALUE=39>เพชรบูรณ์</OPTION>");
	document.write("<OPTION VALUE=40>แพร่</OPTION>");
	document.write("<OPTION VALUE=41>ภูเก็ต</OPTION>");
	document.write("<OPTION VALUE=42>มหาสารคาม</OPTION>");
	document.write("<OPTION VALUE=43>มุกดาหาร</OPTION>");
	document.write(" <OPTION VALUE=44>แม่ฮ่องสอน</OPTION>");
	document.write("<OPTION VALUE=45>ยโสธร</OPTION>");
	document.write(" <OPTION VALUE=46>ยะลา</OPTION>");
	document.write("<OPTION VALUE=47>ร้อยเอ็ด</OPTION>");
	document.write("<OPTION VALUE=48>ระนอง</OPTION>");
	document.write(" <OPTION VALUE=49>ระยอง</OPTION>");
	document.write("<OPTION VALUE=50>ราชบุรี</OPTION>");
	document.write("<OPTION VALUE=51>ลพบุรี</OPTION>");
	document.write("<OPTION VALUE=52>ลำปาง</OPTION>");
	document.write("<OPTION VALUE=53>ลำพูน</OPTION>");
	document.write("<OPTION VALUE=54>เลย</OPTION>");
	document.write("<OPTION VALUE=55>ศรีษะเกษ</OPTION>");
	document.write(" <OPTION VALUE=56>สกลนคร</OPTION>");
	document.write(" <OPTION VALUE=57>สงขลา</OPTION>");
	document.write("<OPTION VALUE=58>สตูล</OPTION>");
	document.write("<OPTION VALUE=59>สมุทรปราการ</OPTION>");
	document.write("<OPTION VALUE=60>สมุทรสงคราม</OPTION>");
	document.write("<OPTION VALUE=61>สมุทรสาคร</OPTION>");
	document.write("<OPTION VALUE=62>สระแก้ว</OPTION>");
	document.write("<OPTION VALUE=63>สระบุรี</OPTION>");
	document.write("<OPTION VALUE=64>สิงห์บุรี</OPTION>");
	document.write("<OPTION VALUE=65>สุโขทัย</OPTION>");
	document.write(" <OPTION VALUE=66>สุพรรณบุรี</OPTION>");
	document.write("<OPTION VALUE=67>สุราษฎร์ธานี</OPTION>");
	document.write(" <OPTION VALUE=68>สุรินทร์</OPTION>");
	document.write("<OPTION VALUE=69>หนองคาย</OPTION>");
	document.write("<OPTION VALUE=70>หนองบัวลำภู</OPTION>");
	document.write("<OPTION VALUE=71>อ่างทอง</OPTION>");
	document.write("<OPTION VALUE=72>อำนาจเจริญ</OPTION>");
	document.write("<OPTION VALUE=73>อุดรธานี</OPTION>");
	document.write("<OPTION VALUE=74>อุตรดิษต์</OPTION>");
	document.write("<OPTION VALUE=75>อุทัยธานี</OPTION>");
	document.write("<OPTION VALUE=76>อุบลราชธานี</OPTION>");
	document.write("</SELECT>");
}
//*************************************************************************
function doapplication()
{
	var postal1length=new String("");
	var postal2length=new String("");
	var ttlength=new String("");
	postal1length=document.application.postal1.value;
	postal2length=document.application.postal2.value;
	ttlength=document.application.id_t_1.value+document.application.id_t_2.value+document.application.id_t_3.value+document.application.id_t_4.value+document.application.id_t_5.value;
	if(document.application.username.value==""){	alert("กรุณากรอกชื่อ Username");	 document.application.username.focus();	}else
	if(document.application.password.value==""){	alert("กรุณากรอก Password");	 document.application.password.focus();	}else
	if(document.application.repassword.value==""){	alert("กรุณายืนยัน Password");	 document.application.repassword.focus();	}else
	if(document.application.password.value!=document.application.repassword.value){		alert("คุณกรอกรหัสผ่านทั้งสองช่องไม่ตรงกัน");	 document.application.repassword.focus();	}else
	if(document.application.startday.value=="0" || document.application.startmonth.value=="0" || document.application.startyear.value=="0"){	alert("กรุณาระบุวันเริ่มทำงาน");	 document.application.startday.focus();	}else
	if(document.application.position.value==""){	alert("กรุณาระบุตำแหน่งพนักงาน");	 document.application.position.focus();	}else
	if(document.application.name.value==""){	alert("กรุณากรอกชื่อพนักงาน");	 document.application.name.focus();	}else
	if(document.application.sname.value==""){		alert("กรุณากรอกนามสกุลภาษาไทย");	 document.application.sname.focus();	}else
	if(document.application.ename.value==""){		alert("กรุณากรอกชื่อภาษาอังกฤษ");	 document.application.ename.focus();	}else
	if(document.application.esname.value==""){	alert("กรุณากรอกนามสกุลภาษาอังกฤษ");	 document.application.esname.focus();	}else
	if(document.application.address1.value==""){		alert("กรุณากรอกข้อมูลที่อยู่ปัจจุบัน");	 document.application.address1.focus();	}else
	if(document.application.address2.value==""){		alert("กรุณาระบุอำเภอของที่อยู่ปัจจุบัน");	 document.application.address2.focus();	}else
	if(document.application.problem.value=="0"){	alert("กรุณาระบุจังหวัดของที่อยู่ปัจจุบัน");	 document.application.problem.focus();	}else
	if(document.application.postal1.value==""){	 	alert("กรุณาระบุรหัสไปรษณีย์");	 document.application.postal1.focus();	}else
	if(document.application.address4.value==""){		alert("กรุณากรอกข้อมูลที่อยู่ตามทะเบียนบ้าน");	 document.application.address4.focus();	}else
	if(document.application.address5.value==""){		alert("กรุณาระบุอำเภอของที่อยู่ตามทะเบียนบ้าน");	 document.application.address5.focus();	}else
	if(document.application.address6.value=="0"){	alert("กรุณาระบุจังหวัดของที่อยู่ตามทะเบียนบ้าน");	 document.application.address6.focus();	}else
	if(document.application.postal2.value==""){		alert("กรุณาระบุรหัสไปรษณีย์");	 document.application.postal2.focus();	}else
	if(document.application.birthday.value=="0" || document.application.birthmonth.value=="0" || document.application.birthyear.value=="0"){	alert("กรุณาระบุวันเกิดของพนักงาน");	 document.application.birthday.focus();	}else
	if(postal1length.length!=5){	alert("ท่านกรอกรหัสไปรษณีย์ไม่ครบ 5 หลัก");	document.application.postal1.focus();}else
	if(postal2length.length!=5){	alert("ท่านกรอกรหัสไปรษณีย์ไม่ครบ 5 หลัก");	document.application.postal2.focus();}else
	if(ttlength.length!=13){	alert("ท่านกรอกเลขที่บัตรประชาชนไม่ครบ 13 หลัก");	document.application.id_t_1.focus();}else
	{
		document.application.submit();
	}
}
//*****************************************

//-->
