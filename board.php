 <div id="showData"></div>  
 <link rel="stylesheet" href="style.css" />

<script type="text/javascript" src="include.con/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
		// 1 วินาที่ เท่า 1000
		// คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
		var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
				url:"gdata.php",
				data:"rev=1",
				async:false,
				success:function(getData){
					$("div#showData").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
				}
		}).responseText;
	},3000);	
});
</script>          
 