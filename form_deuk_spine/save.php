<?php
require_once(__DIR__ . "/../../globals.php");
require_once("$srcdir/api.inc");
require_once("$srcdir/forms.inc");

if (!$encounter) { // comes from globals.php
     die(xlt("Internal error: we do not seem to be in an encounter!"));
 }
 $id = (int) (isset($_GET['id']) ? $_GET['id'] : '');

$pid = $_SESSION['pid'];
$lumbar = $_POST['lumbar'];
$dos = $_POST['dos'];
$room_no = $_POST['room_no'];
$ins_num = $_POST['ins_num'];
$ma_ins = $_POST['ma_ins'];
$last_visit = $_POST['last_visit'];
$cc = $_POST['cc'];
$hx = $_POST['hx'];
$Worst = $_POST['Worst'];
$Average = $_POST['Average'];
$Best = $_POST['Best'];
$bp1 = $_POST['bp1'];
$bp2 = $_POST['bp2'];
$hrs = $_POST['hrs'];
$o2 = $_POST['o2'];
$lbp = $_POST['lbp'];
$lep = $_POST['lep'];
$right1 = $_POST['right1'];
$right2 = $_POST['right2'];
$right3 = $_POST['right3'];
$right4 = $_POST['right4'];
$right5 = $_POST['right5'];
$left1 = $_POST['left1'];
$left2 = $_POST['left2'];
$left3 = $_POST['left3'];
$left4 = $_POST['left4'];
$left5 = $_POST['left5'];
$right_s1 = $_POST['right_s1'];
$right_s2 = $_POST['right_s2'];
$right_s3 = $_POST['right_s3'];
$right_s4 = $_POST['right_s4'];
$right_s5 = $_POST['right_s5'];
$left_s1 = $_POST['left_s1'];
$left_s2 = $_POST['left_s2'];
$left_s3 = $_POST['left_s3'];
$left_s4 = $_POST['left_s4'];
$left_s5 = $_POST['left_s5'];
$ap1 = $_POST['ap1'];
$ap2 = $_POST['ap2'];
$ap3 = $_POST['ap3'];
$ap4 = $_POST['ap4'];
$ap5 = $_POST['ap5'];
$check1 = $_POST['check1']?1:0;
$check2 = $_POST['check2']?1:0;
$check3 = $_POST['check3']?1:0;
$check4 = $_POST['check4']?1:0;
$check5 = $_POST['check5']?1:0;
$check6 = $_POST['check6']?1:0;
$check7 = $_POST['check7']?1:0;
$check8 = $_POST['check8']?1:0;
$check9 = $_POST['check9']?1:0;
$check10 = $_POST['check10']?1:0;
$check11 = $_POST['check11']?1:0;
$check12 = $_POST['check12']?1:0;
$check13 = $_POST['check13']?1:0;
$check14 = $_POST['check14']?1:0;
$check15 = $_POST['check15']?1:0;
$check16 = $_POST['check16']?1:0;
$check17 = $_POST['check17']?1:0;
$sign1 = $_POST['sign1'];
$sign2 = $_POST['sign2'];
$pat_label = $_POST['pat_label'];

$normal_gail= $_POST['normal_gail']?1:0;
$antalgic_gail= $_POST['antalgic_gail']?1:0;
$normal_hamstring= $_POST['normal_hamstring']?1:0;
$contracture_hamstring= $_POST['contracture_hamstring']?1:0;
$normal_ischial= $_POST['normal_ischial']?1:0;
$tend_ischial= $_POST['tend_ischial']?1:0;
$normal_itb= $_POST['normal_itb']?1:0;
$tend_itb= $_POST['tend_itb']?1:0;
$normal_leg= $_POST['normal_leg']?1:0;
$positive_leg= $_POST['positive_leg']?1:0;
$normal_piriformise= $_POST['normal_piriformise']?1:0;
$tend_piriformise= $_POST['tend_piriformise']?1:0;
$normal_pulse= $_POST['normal_pulse']?1:0;
$tend_pulse= $_POST['tend_pulse']?1:0;
$normal_troch= $_POST['normal_troch']?1:0;
$tend_troch= $_POST['tend_troch']?1:0;
$normal_sl= $_POST['normal_sl']?1:0;
$positive_sl= $_POST['positive_sl']?1:0;
$normal_facet= $_POST['normal_facet']?1:0;
$positive_facet= $_POST['positive_facet']?1:0;
$normal_muscle= $_POST['normal_muscle']?1:0;
$positive_muscle= $_POST['positive_muscle']?1:0;
$Patella_right1= $_POST['Patella_right1'];
$Patella_right2= $_POST['Patella_right2'];
$Ankle_left1= $_POST['Ankle_left1'];
$Ankle_left2= $_POST['Ankle_left2'];
$hip_check= $_POST['hip_check']?1:0;
$knee_check= $_POST['knee_check']?1:0;
$shoulder_check= $_POST['shoulder_check']?1:0;


$sets = "pid =?,enc=?,dos =?,room_no =?,ins_num =?,ma_ins =?,last_visit =?,cc =?,hx =?,Worst =?,Average =?,Best =?,bp1 =?,bp2 =?,hrs =?,o2 =?,lbp =?,lep =?,right1 =?,right2 =?,right3 =?,right4 =?,right5 =?,left1 =?,left2 =?,left3 =?,left4 =?,left5 =?,right_s1 =?,right_s2 =?,right_s3 =?,right_s4 =?,right_s5 =?,left_s1 =?,left_s2 =?,left_s3 =?,left_s4 =?,left_s5 =?,ap1 =?,ap2 =?,ap3 =?,ap4 =?,ap5 =?,check1 =?,check2 =?,check3 =?,check4 =?,check5 =?,check6 =?,check7 =?,check8 =?,check9 =?,check10 =?,check11 =?,check12 =?,check13 =?,check14 =?,check15 =?,check16 =?,check17 =?,sign1 =?,sign2 =?,pat_label =?,normal_gail =?,antalgic_gail =?,normal_hamstring =?,contracture_hamstring =?,normal_ischial =?,tend_ischial =?,normal_itb =?,tend_itb =?,normal_leg =?,positive_leg =?,normal_piriformise =?,tend_piriformise =?,normal_pulse =?,tend_pulse =?,normal_troch =?,tend_troch =?,normal_sl =?,positive_sl =?,normal_facet =?,positive_facet =?,normal_muscle =?,positive_muscle =?,Patella_right1 =?,Patella_right2 =?,Ankle_left1 =?,Ankle_left2 =?,hip_check =?,knee_check =?,shoulder_check=?";


$value = [$pid,$encounter,$dos,$room_no,$ins_num,$ma_ins,$last_visit,$cc,$hx,$Worst,$Average,$Best,$bp1,$bp2,$hrs,$o2,$lbp,$lep,$right1,$right2,$right3,$right4,$right5,$left1, $left2, $left3, $left4, $left5, $right_s1, $right_s2, $right_s3, $right_s4, $right_s5, $left_s1, $left_s2, $left_s3, $left_s4, $left_s5, $ap1,$ap2,$ap3,$ap4,$ap5, $check1, $check2, $check3, $check4, $check5, $check6, $check7, $check8, $check9, $check10, $check11, $check12, $check13, $check14, $check15, $check16, $check17, $sign1, $sign2, $pat_label,$normal_gail,$antalgic_gail,$normal_hamstring,$contracture_hamstring,$normal_ischial,$tend_ischial,$normal_itb,$tend_itb,$normal_leg,$positive_leg,$normal_piriformise,$tend_piriformise,$normal_pulse,$tend_pulse,$normal_troch,$tend_troch,$normal_sl,$positive_sl,$normal_facet,$positive_facet,$normal_muscle,$positive_muscle,$Patella_right1,$Patella_right2,$Ankle_left1,$Ankle_left2,$hip_check,$knee_check,$shoulder_check];


if ($id && $id != 0) {
    sqlStatement("UPDATE `form_deuk_spine` SET  ".$sets ."  WHERE id =$id", $value);
}else 
{
     $newid = sqlInsert("INSERT INTO `form_deuk_spine`( `pid`,`enc`,`lumbar`, `dos`, `room_no`, `ins_num`, `ma_ins`, `last_visit`, `cc`, `hx`, `Worst`, `Average`, `Best`, `bp1`, `bp2`, `hrs`, `o2`, `lbp`, `lep`, `right1`, `right2`, `right3`, `right4`, `right5`, `left1`, `left2`, `left3`, `left4`, `left5`, `right_s1`, `right_s2`, `right_s3`, `right_s4`, `right_s5`, `left_s1`, `left_s2`, `left_s3`, `left_s4`, `left_s5`, `ap1`,`ap2`, `ap3`,`ap4`,`ap5`, `check1`, `check2`, `check3`, `check4`, `check5`, `check6`, `check7`, `check8`, `check9`, `check10`, `check11`, `check12`, `check13`, `check14`, `check15`, `check16`, `check17`, `sign1`, `sign2`, `pat_label`,`normal_gail`,`antalgic_gail`,`normal_hamstring`,`contracture_hamstring`,`normal_ischial`,`tend_ischial`,`normal_itb`,`tend_itb`,`normal_leg`,`positive_leg`,`normal_piriformise`,`tend_piriformise`,`normal_pulse`,`tend_pulse`,`normal_troch`,`tend_troch`,`normal_sl`,`positive_sl`,`normal_facet`,`positive_facet`,`normal_muscle`,`positive_muscle`,`Patella_right1`,`Patella_right2`,`Ankle_left1`,`Ankle_left2`,`hip_check`,`knee_check`,`shoulder_check`) VALUES ('$pid','$encounter','$lumbar','$dos','$room_no','$ins_num','$ma_ins','$last_visit','$cc','$hx','$Worst','$Average','$Best','$bp1','$bp2','$hrs','$o2','$lbp','$lep','$right1','$right2','$right3','$right4','$right5','$left1', '$left2', '$left3', '$left4', '$left5', '$right_s1', '$right_s2', '$right_s3', '$right_s4', '$right_s5', '$left_s1', '$left_s2', '$left_s3', '$left_s4', '$left_s5', '$ap1','$ap2','$ap3','$ap4', '$ap5', '$check1', '$check2', '$check3', '$check4', '$check5', '$check6', '$check7', '$check8', '$check9', '$check10', '$check11', '$check12', '$check13', '$check14', '$check15', '$check16', '$check17', '$sign1', '$sign2', '$pat_label','$normal_gail','$antalgic_gail','$normal_hamstring','$contracture_hamstring','$normal_ischial','$tend_ischial','$normal_itb','$tend_itb','$normal_leg','$positive_leg','$normal_piriformise','$tend_piriformise','$normal_pulse','$tend_pulse','$normal_troch','$tend_troch','$normal_sl','$positive_sl','$normal_facet','$positive_facet','$normal_muscle','$positive_muscle','$Patella_right1','$Patella_right2','$Ankle_left1','$Ankle_left2','$hip_check','$knee_check','$shoulder_check')");
     
    addForm($encounter, "Deuk Spine", $newid, "form_deuk_spine",  $_SESSION["pid"], $userauthorized);
}

formHeader("Redirecting....");
formJump();
formFooter();
 

