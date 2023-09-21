<?php
require_once(__DIR__ . "/../../globals.php");
require_once("$srcdir/api.inc");
require_once("$srcdir/forms.inc");

if (!$encounter) { // comes from globals.php
     die(xlt("Internal error: we do not seem to be in an encounter!"));
 }

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
$aps = $_POST['aps'];
$check1 = $_POST['check1'];
$check2 = $_POST['check2'];
$check3 = $_POST['check3'];
$check4 = $_POST['check4'];
$check5 = $_POST['check5'];
$check6 = $_POST['check6'];
$check7 = $_POST['check7'];
$check8 = $_POST['check8'];
$check9 = $_POST['check9'];
$check10 = $_POST['check10'];
$check11 = $_POST['check11'];
$check12 = $_POST['check12'];
$check13 = $_POST['check13'];
$check14 = $_POST['check14'];
$check15 = $_POST['check15'];
$check16 = $_POST['check16'];
$check17 = $_POST['check17'];
$sign1 = $_POST['sign1'];
$sign2 = $_POST['sign2'];
$pat_label = $_POST['pat_label'];

// $aps = $_POST['aps'];
// $aps = $_POST['aps'];
// $aps = $_POST['aps'];
// $aps = $_POST['aps'];


if ($id && $id != 0) {
    sqlStatement("UPDATE `form_follow` SET  `comment1`=?, `comment2`=?, `comment3`=?, `comment4`=?, `comment5`=?, `comment6`=?, `comment7`=?, `comment8`=?, `date1`=?, `date2`=?, `date3`=?, `sign1`=?, `sign2`=?, `sign3`=?, `name1`=?, `name2`=?, `name3`=? WHERE id =?", array($comment1,$comment2, $comment3, $comment4, $comment5, $comment6, $comment7, $comment8,$date1,$date2,$date3,$sign1,$sign2,$sign3,$name1,$name2,$name3, $id));
}else 
{
     $newid = sqlInsert("INSERT INTO `form_deuk_spine`( `pid`,`enc`,`lumbar`, `dos`, `room_no`, `ins_num`, `ma_ins`, `last_visit`, `cc`, `hx`, `Worst`, `Average`, `Best`, `bp1`, `bp2`, `hrs`, `o2`, `lbp`, `lep`, `right1`, `right2`, `right3`, `right4`, `right5`, `left1`, `left2`, `left3`, `left4`, `left5`, `right_s1`, `right_s2`, `right_s3`, `right_s4`, `right_s5`, `left_s1`, `left_s2`, `left_s3`, `left_s4`, `left_s5`, `ap1`, `aps`, `check1`, `check2`, `check3`, `check4`, `check5`, `check6`, `check7`, `check8`, `check9`, `check10`, `check11`, `check12`, `check13`, `check14`, `check15`, `check16`, `check17`, `sign1`, `sign2`, `pat_label`) VALUES ('$pid','$encounter','$lumbar','$dos','$room_no','$ins_num','$ma_ins','$last_visit','$cc','$hx','$Worst','$Average','$Best','$bp1','$bp2','$hrs','$o2','$lbp','$lep','$right1','$right2','$right3','$right4','$right5','$left1', '$left2', '$left3', '$left4', '$left5', '$right_s1', '$right_s2', '$right_s3', '$right_s4', '$right_s5', '$left_s1', '$left_s2', '$left_s3', '$left_s4', '$left_s5', '$ap1', '$aps', '$check1', '$check2', '$check3', '$check4', '$check5', '$check6', '$check7', '$check8', '$check9', '$check10', '$check11', '$check12', '$check13', '$check14', '$check15', '$check16', '$check17', '$sign1', '$sign2', '$pat_label')");
//     $newid = sqlInsert("INSERT INTO `form_follow`(`pid`,`encounter`, `comment1`, `comment2`, `comment3`, `comment4`, `comment5`, `comment6`, `comment7`, `comment8`, `date1`, `date2`, `date3`, `sign1`, `sign2`, `sign3`, `name1`, `name2`, `name3`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
//     array($_SESSION["pid"],$_SESSION["encounter"],$comment1,$comment2, $comment3, $comment4, $comment5, $comment6, $comment7, $comment8,$date1,$date2,$date3,$sign1,$sign2,$sign3,$name1,$name2,$name3));
    addForm($encounter, "Deuk Spine", $newid, "form_deuk_spine",  $_SESSION["pid"], $userauthorized);
}

formHeader("Redirecting....");
formJump();
formFooter();
 

