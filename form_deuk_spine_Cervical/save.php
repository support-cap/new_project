<?php
require_once(__DIR__ . "/../../globals.php");
require_once("$srcdir/api.inc");
require_once("$srcdir/forms.inc");

if (!$encounter) { // comes from globals.php
     die(xlt("Internal error: we do not seem to be in an encounter!"));
 }

$pid = $_SESSION['pid'];

$dos= $_POST['dos'];
$room_no= $_POST['room_no'];
$ins_num= $_POST['ins_num'];
$ma_ins= $_POST['ma_ins'];
$last_visit= $_POST['last_visit'];
$cc= $_POST['cc'];
$hx= $_POST['hx'];
$shx= $_POST['shx'];
$Worst= $_POST['Worst'];
$Average= $_POST['Average'];
$Best= $_POST['Best'];
$neck= $_POST['neck'];
$uep= $_POST['uep'];
$bp1= $_POST['bp1'];
$bp2= $_POST['bp2'];
$hrs= $_POST['hrs'];
$right1= $_POST['right1'];
$right2= $_POST['right2'];
$right3= $_POST['right3'];
$right4= $_POST['right4'];
$right5= $_POST['right5'];
$right6= $_POST['right6'];
$right7= $_POST['right7'];
$right8= $_POST['right8'];
$right9= $_POST['right9'];
$right10= $_POST['right10'];
$left1= $_POST['left1'];
$left2= $_POST['left2'];
$left3= $_POST['left3'];
$left4= $_POST['left4'];
$left5= $_POST['left5'];
$left6= $_POST['left6'];
$left7= $_POST['left7'];
$left8= $_POST['left8'];
$left9= $_POST['left9'];
$left10= $_POST['left10'];
$right_s1= $_POST['right_s1'];
$right_s2= $_POST['right_s2'];
$right_s3= $_POST['right_s3'];
$right_s4= $_POST['right_s4'];
$right_s5= $_POST['right_s5'];
$right_s6= $_POST['right_s6'];
$right_s7= $_POST['right_s7'];
$right_s8= $_POST['right_s8'];
$right_s9= $_POST['right_s9'];
$right_s10= $_POST['right_s10'];
$left_s1= $_POST['left_s1'];
$left_s2= $_POST['left_s2'];
$left_s3= $_POST['left_s3'];
$left_s4= $_POST['left_s4'];
$left_s5= $_POST['left_s5'];
$left_s6= $_POST['left_s6'];
$left_s7= $_POST['left_s7'];
$left_s8= $_POST['left_s8'];
$left_s9= $_POST['left_s9'];
$left_s10= $_POST['left_s10'];
$n_Clonus= $_POST['n_Clonus']?1:0;
$p_Clonus= $_POST['p_Clonus']?1:0;
$n_Hoffman= $_POST['n_Hoffman']?1:0;
$p_Hoffman= $_POST['p_Hoffman']?1:0;
$n_Rhomberg= $_POST['n_Rhomberg']?1:0;
$p_Rhomberg= $_POST['p_Rhomberg']?1:0;
$n_Babinski= $_POST['n_Babinski']?1:0;
$p_Babinski= $_POST['p_Babinski']?1:0;
$n_Coordination= $_POST['n_Coordination']?1:0;
$nb_Coordination= $_POST['nb_Coordination']?1:0;
$u_Coordination= $_POST['u_Coordination']?1:0;
$l_Coordination= $_POST['l_Coordination']?1:0;
$n_Facet= $_POST['n_Facet']?1:0;
$p_Facet= $_POST['p_Facet']?1:0;
$n_shoulder= $_POST['n_shoulder']?1:0;
$p_shoulder= $_POST['p_shoulder']?1:0;
$n_Spurlings= $_POST['n_Spurlings']?1:0;
$p_Spurlings= $_POST['p_Spurlings']?1:0;
$n_Tinnels= $_POST['n_Tinnels']?1:0;
$p_Tinnels= $_POST['p_Tinnels']?1:0;
$w_Tinnels= $_POST['w_Tinnels']?1:0;
$e_Tinnels= $_POST['e_Tinnels']?1:0;
$n_Muscle= $_POST['n_Muscle']?1:0;
$p_Muscle= $_POST['p_Muscle']?1:0;
$Patella_right1= $_POST['Patella_right1'];
$Patella_right2= $_POST['Patella_right2'];
$Patella_right3= $_POST['Patella_right3'];
$Patella_right4= $_POST['Patella_right4'];
$Ankle_left1= $_POST['Ankle_left1'];
$Ankle_left2= $_POST['Ankle_left2'];
$Ankle_left3= $_POST['Ankle_left3'];
$Ankle_left4= $_POST['Ankle_left4'];
$hip_check= $_POST['hip_check'];
$knee_check= $_POST['knee_check'];
$shoulder_check= $_POST['shoulder_check'];
$sign1= $_POST['sign1'];
$sign2= $_POST['sign2'];
$check1= $_POST['check1']?1:0;
$check2= $_POST['check2']?1:0;
$check3= $_POST['check3']?1:0;
$check4= $_POST['check4']?1:0;
$check5= $_POST['check5']?1:0;
$check6= $_POST['check6']?1:0;
$check7= $_POST['check7']?1:0;
$check8= $_POST['check8']?1:0;
$check9= $_POST['check9']?1:0;
$check10= $_POST['check10']?1:0;
$check11= $_POST['check11']?1:0;
$check12= $_POST['check12']?1:0;
$check13= $_POST['check13']?1:0;
$check14= $_POST['check14']?1:0;
$check15= $_POST['check15']?1:0;
$check16= $_POST['check16']?1:0;
$ap1= $_POST['ap1'];
$ap2= $_POST['ap2'];
$ap3= $_POST['ap3'];
$ap4= $_POST['ap4'];
$ap5= $_POST['ap5'];
$pat_label= $_POST['pat_label'];


$sets = "pid =?, enc = ?, dos = ?,
room_no = ?,
ins_num= ?,
ma_ins= ?,
last_visit= ?,
cc= ?,
hx= ?,
shx= ?,
Worst= ?,
Average= ?,
Best= ?,
neck= ?,
uep= ?,
bp1= ?,
bp2= ?,
hrs= ?,
right1= ?,
right2= ?,
right3= ?,
right4= ?,
right5= ?,
right6= ?,
right7= ?,
right8= ?,
right9= ?,
right10= ?,
left1= ?,
left2= ?,
left3= ?,
left4= ?,
left5= ?,
left6= ?,
left7= ?,
left8= ?,
left9= ?,
left10= ?,
right_s1= ?,
right_s2= ?,
right_s3= ?,
right_s4= ?,
right_s5= ?,
right_s6= ?,
right_s7= ?,
right_s8= ?,
right_s9= ?,
right_s10= ?,
left_s1= ?,
left_s2= ?,
left_s3= ?,
left_s4= ?,
left_s5= ?,
left_s6= ?,
left_s7= ?,
left_s8= ?,
left_s9= ?,
left_s10= ?,
n_Clonus= ?,
p_Clonus= ?,
n_Hoffman= ?,
p_Hoffman= ?,
n_Rhomberg= ?,
p_Rhomberg= ?,
n_Babinski= ?,
p_Babinski= ?,
n_Coordination= ?,
nb_Coordination= ?,
u_Coordination= ?,
l_Coordination= ?,
n_Facet= ?,
p_Facet= ?,
n_shoulder= ?,
p_shoulder= ?,
n_Spurlings= ?,
p_Spurlings= ?,
n_Tinnels= ?,
p_Tinnels= ?,
w_Tinnels= ?,
e_Tinnels= ?,
n_Muscle= ?,
p_Muscle= ?,
Patella_right1= ?,
Patella_right2= ?,
Patella_right3= ?,
Patella_right4= ?,
Ankle_left1= ?,
Ankle_left2= ?,
Ankle_left3= ?,
Ankle_left4= ?,
hip_check= ?,
knee_check= ?,
shoulder_check= ?,
sign1= ?,
sign2= ?,
check1= ?,
check2= ?,
check3= ?,
check4= ?,
check5= ?,
check6= ?,
check7= ?,
check8= ?,
check9= ?,
check10= ?,
check11= ?,
check12= ?,
check13= ?,
check14= ?,
check15= ?,
check16= ?,
ap1= ?,
ap2= ?,
ap3= ?,
ap4= ?,
ap5= ?,
pat_label= ?" ;
$id = (int) (isset($_GET['id']) ? $_GET['id'] : '');
if ($id && $id != 0) {
    sqlStatement("UPDATE `form_deuk_spine_Cervical` SET  " . $sets ." WHERE id = $id",
    [$pid,$encounter,$dos, $room_no, $ins_num, $ma_ins, $last_visit, $cc, $hx,$shx, $Worst, $Average, $Best, $neck, $uep, $bp1, $bp2, $hrs, $right1, $right2, $right3, $right4, $right5, $right6, $right7, $right8, $right9, $right10, $left1, $left2, $left3, $left4, $left5, $left6, $left7, $left8, $left9, $left10, $right_s1, $right_s2, $right_s3, $right_s4, $right_s5, $right_s6, $right_s7, $right_s8, $right_s9, $right_s10, $left_s1, $left_s2, $left_s3, $left_s4, $left_s5, $left_s6, $left_s7, $left_s8, $left_s9, $left_s10, $n_Clonus, $p_Clonus, $n_Hoffman, $p_Hoffman, $n_Rhomberg, $p_Rhomberg, $n_Babinski, $p_Babinski, $n_Coordination, $nb_Coordination, $u_Coordination, $l_Coordination, $n_Facet, $p_Facet, $n_shoulder, $p_shoulder, $n_Spurlings, $p_Spurlings, $n_Tinnels, $p_Tinnels, $w_Tinnels, $e_Tinnels, $n_Muscle, $p_Muscle, $Patella_right1, $Patella_right2, $Patella_right3, $Patella_right4, $Ankle_left1, $Ankle_left2, $Ankle_left3, $Ankle_left4, $hip_check, $knee_check, $shoulder_check, $sign1, $sign2, $check1, $check2, $check3, $check4, $check5, $check6, $check7, $check8, $check9, $check10, $check11, $check12, $check13, $check14, $check15, $check16, $ap1, $ap2, $ap3, $ap4, $ap5, $pat_label]);
}else 
{
     $newid = sqlInsert ("INSERT INTO `form_deuk_spine_Cervical` SET " . $sets,
     [$pid,$encounter,$dos, $room_no, $ins_num, $ma_ins, $last_visit, $cc, $hx, $shx, $Worst, $Average, $Best, $neck, $uep, $bp1, $bp2, $hrs, $right1, $right2, $right3, $right4, $right5, $right6, $right7, $right8, $right9, $right10, $left1, $left2, $left3, $left4, $left5, $left6, $left7, $left8, $left9, $left10, $right_s1, $right_s2, $right_s3, $right_s4, $right_s5, $right_s6, $right_s7, $right_s8, $right_s9, $right_s10, $left_s1, $left_s2, $left_s3, $left_s4, $left_s5, $left_s6, $left_s7, $left_s8, $left_s9, $left_s10, $n_Clonus, $p_Clonus, $n_Hoffman, $p_Hoffman, $n_Rhomberg, $p_Rhomberg, $n_Babinski, $p_Babinski, $n_Coordination, $nb_Coordination, $u_Coordination, $l_Coordination, $n_Facet, $p_Facet, $n_shoulder, $p_shoulder, $n_Spurlings, $p_Spurlings, $n_Tinnels, $p_Tinnels, $w_Tinnels, $e_Tinnels, $n_Muscle, $p_Muscle, $Patella_right1, $Patella_right2, $Patella_right3, $Patella_right4, $Ankle_left1, $Ankle_left2, $Ankle_left3, $Ankle_left4, $hip_check, $knee_check, $shoulder_check, $sign1, $sign2, $check1, $check2, $check3, $check4, $check5, $check6, $check7, $check8, $check9, $check10, $check11, $check12, $check13, $check14, $check15, $check16, $ap1, $ap2, $ap3, $ap4, $ap5, $pat_label]);

    addForm($encounter, "Deuk Spine_Cervical", $newid, "form_deuk_spine_Cervical",  $_SESSION["pid"], $userauthorized);
}

formHeader("Redirecting....");
formJump();
formFooter();
 

