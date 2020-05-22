<?php
error_reporting( error_reporting() & ~E_NOTICE );
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       

 

// เชื่อมต่อฐานข้อมูล
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2011 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2011 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.6, 2011-02-27
 */

/** Error reporting */
//error_reporting(E_ALL);

//date_default_timezone_set('Asia/Bangkok');

/** PHPExcel */
require_once 'Classes/PHPExcel.php';


// Create new PHPExcel object
//echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
//echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Chalermpon Srikam")
							 ->setLastModifiedBy("Chalermpon Srikam")
							 ->setTitle("Report")
							 ->setSubject("Report")
							 ->setDescription("Report By Srimuangmai Hospital")
							 ->setKeywords("Report By Srimuangmai Hospital")
							 ->setCategory("Report");


// Add some data
//echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'AN')
            ->setCellValue('B1', 'AN')
            ->setCellValue('C1', 'HN')
            ->setCellValue('D1', 'วอร์ด')
            ->setCellValue('E1', 'วันที่แอดมิด/เวลา')
			 ->setCellValue('F1', 'สิทธิ')
			  ->setCellValue('G1', 'DX')
			   ->setCellValue('H1', 'Discharge')
			    ->setCellValue('I1', 'ICD10')
			    ->setCellValue('J1', 'แพทย์แอดมิด');

 include "../include.con/config.inc.php";
 

$strSQL="SELECT
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
where (DATE(rgtdate) between ('$_GET[date_a]') and ('$_GET[date_b]')) and ((iptdx.icd10 not BETWEEN 'O000' and 'O999') or (iptdx.icd10='z370'))
GROUP BY ipt.vn";
$objQuery =$mysqli_hi->query($strSQL);

$i =2;
$i2 =1;
while($objResult=$objQuery->fetch_assoc())
{

if(strlen($objResult[DOC_ADMID])=='4'){
 $restdct = substr("$objResult[DOC_ADMID]", 0, -2);
$restdct2 = substr("$objResult[DOC_ADMID]",-2, 2); 
$q_dct="SELECT dct,fname as fname,lname as lname FROM  dct where dct='$restdct'";
 $qr_dct=$mysqli_hi->query($q_dct);
 $rs_dct=$qr_dct->fetch_assoc();
 $q_dct2="SELECT dct,fname,lname FROM  dct where dct='$restdct2'";
 $qr_dct2=$mysqli_hi->query($q_dct2);
 $rs_dct2=$qr_dct2->fetch_assoc();
}else{
$q_dct_dc="SELECT dct,fname as fname,lname as lname,lcno FROM  dct where lcno='$objResult[DOC_ADMID]'";
 $qr_dct_dc=$mysqli_hi->query($q_dct_dc);
 $rs_dct_dc=$qr_dct_dc->fetch_assoc();
}

  
      $objPHPExcel->getActiveSheet()->setCellValue('A' . $i,$i2);
    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $objResult["an"]);
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $objResult["hn"]);
	$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $objResult["ward"]);
	$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $objResult["rgtdate"]);
	$objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $objResult["namepttype"]);	
	$objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $objResult["prediag"]);	
	$objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $objResult["dchdate"]);
	$objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $objResult["icd10"]);
	if(strlen($objResult[DOC_ADMID])=='4'){
		$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $rs_dct["fname"]."  ".$rs_dct["lname"]."/".$rs_dct2["fname"]."  ".$rs_dct2["lname"]);
	}else{
				$objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $rs_dct_dc["fname"]."  ".$rs_dct_dc["lname"]);
	}

 $i2++;
	$i++;
}

// Rename sheet
//echo date('H:i:s') . " Rename sheet\n";
 
$objPHPExcel->getActiveSheet()->setTitle('DataCenter-Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
//echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$strFileName = "reportxls/ADMID-$_GET[date_a]-$_GET[date_b].xlsx";
 $objWriter->save($strFileName);
 $fsize=" Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";
 $fdat=date("Y-m-d h:i:s");
/*$strSQL2 = "INSERT INTO  `filexls` (
`xls_id` ,
`xls_file` ,
`xls_size` ,
`xls_date`
)
VALUES (
NULL ,  '$strFileName',  '$fsize',  '$fdat')";
$objQuery2 = mysql_db_query($dbname2,$strSQL2);
*/
 
// Echo done
echo "<h2><div align=center><BR><BR><BR><BR>";
echo "เวลา ".date('H:i:s') . "  ดึงข้อมูลเรียบร้อย.\r\n <BR><a href=".$strFileName.">ดาวน์โหลด ไฟล์ Excel</a>";
echo "<BR>Memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n</div></h2>";
echo "<BR><BR>".$credit."";
?>