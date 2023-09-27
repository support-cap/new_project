<?php
   require_once(__DIR__ . "/../../globals.php");
   require_once("$srcdir/api.inc");
   require_once("$srcdir/patient.inc");
   require_once("$srcdir/options.inc.php");
   
   use OpenEMR\Common\Csrf\CsrfUtils;
   use OpenEMR\Core\Header;
   
  $returnurl = 'encounter_top.php';
  $formid = 0 + (isset($_GET['id']) ? $_GET['id'] : 0);
  if ($formid) {
      $sql = "SELECT * FROM `form_deuk_spine` WHERE id=? AND pid = ? AND enc = ?";
      $res = sqlStatement($sql, array($formid,$_SESSION["pid"], $_SESSION["encounter"]));
      for ($iter = 0; $row = sqlFetchArray($res); $iter++) {
          $all[$iter] = $row;
      }
      $check_res = $all[0];
  }

  $check_res = $formid ? $check_res : array();

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Beck Depression Inventory</title>
      <!-- Latest compiled and minified CSS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
      <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
      <style type="text/css">
          td{
            font-size: 15px;
          }
          #id1{
            margin-left: 56px;
          }
          input {
            border: 0;
            outline: 0;
            border-bottom: 1px solid black;      
          }
          .h3_1{
            text-align:center;
            font-size: 20px;
          }
          .tabel5 td p{
            margin-left: 10px;
          }
          b{
            margin-left: 10px;
          }
          input[type="checkbox"] {
              margin-right: 5px;
          }
          .btndiv {
                  text-align: center;
                  margin-bottom: 18px;
                  }
                  .subbtn {
                  background: blue;
                  color: white;
                  }
                  button.cancel {
                  background: red;
                  color: white;
                  }
          .asinput{
            width:60%;
          }
          
  </style>
</head>
<body>
    <div class="container mt-3">
    <div class="row" style="border:1px solid black;" >
      <div class="container-fluid">
        <br><br>
        <form method="post" name="my_form" action="<?php echo $rootdir; ?>/forms/form_deuk_spine/save.php?id=<?php echo attr_url($formid); ?>">
        <h4 align="center" style="width:100%;">Deuk Spine Institute Consultation</h4>
        <h6 align="center"> Lumbar</h6>
        <div class="row">
          <div class="col-4">
                 <label style="border: 1px solid;padding:2px"> pain: X Numbness :O Weekness : /pins & needles: * </label>      
          </div>
          <div class="col-3">DOS <input type="date" value="<?php echo attr($check_res["dos"]); ?>" name="dos" id="dos"></div>
          <div class="col-5">
               Room #:  <input type="text" value="<?php echo attr($check_res["room_no"]); ?>" name="room_no" id="room_no"><br>
               Insurance : <input type="text" value="<?php echo attr($check_res["ins_num"]); ?>" name="ins_num" id="ins_num"><br>
               MA  Initials : <input type="text" value="<?php echo attr($check_res["ma_ins"]); ?>" name="ma_ins" id="ma_ins">     
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-5" align="center">
               <img src="../../forms/form_deuk_spine/deuk.png" alt="form_deuk_spine" style="width:80%">
          </div>
          <div class="col-6">
               Last Visit: <input type="date" value="<?php echo attr($check_res["last_visit"]); ?>" name="last_visit" id="last_visit" style="width:80%"><br>
               CC: <input type="text" value="<?php echo attr($check_res["cc"]); ?>" name="cc" id="cc" style="width:80%"><br>
               Hx: <input type="text" value="<?php echo attr($check_res["hx"]); ?>" name="hx" id="hx" style="width:80%"><br><br>
               My Pain(1-10) is :  &emsp;
               Worst : <input type="text" value="<?php echo attr($check_res["Worst"]); ?>" name="Worst" id="Worst" style="width:25px" maxlength=2> /10 &emsp; 
               Average : <input type="text" value="<?php echo attr($check_res["Average"]); ?>" name="Average" id="Average" style="width:25px" maxlength=2> /10 &emsp;
               Best : <input type="text" value="<?php echo attr($check_res["Best"]); ?>" name="Best" id="Best" style="width:25px" maxlength=2> /10 <br><br>
          <div class="row">
               <div class = "col-6">
                    <div style="padding : 5px;border:1px solid"> Vitals : BP :<input type="text" value="<?php echo attr($check_res["bp1"]); ?>" name="bp1" id="bp1" style="width:25px" maxlength=3> / <input type="text" value="<?php echo attr($check_res["bp2"]); ?>" name="bp2" id="bp2" style="width:25px" maxlength=2> &emsp; HR : <input type="text" value="<?php echo attr($check_res["hrs"]); ?>" name="hrs" id="hrs"  style="width:25px"maxlength=2>  &emsp; O2% : <input type="text" value="<?php echo attr($check_res["o2"]); ?>"  style="width:25px"name="o2" id="o2" maxlength=3> </div>
               </div>
                    <div class = "col-6">
                         <div style="padding : 5px;border:1px solid">
                              LBP  : <input type="text" value="<?php echo attr($check_res["lbp"]); ?>" name="lbp" id="lbp" style="width:25px" maxlength=3> % &emsp;
                              LEP  : <input type="text" value="<?php echo attr($check_res["lep"]); ?>" name="lep" id="lep" style="width:25px" maxlength=3> %
                              <br> <b>R &emsp;&emsp;&emsp; L &emsp;&emsp;&emsp; B </b>
                         </div>
                    </div>
                    <div class="row" style="margin-top : 20px;">
                         <div class="col-6">
                              <table class="table-bordered">
                                   <tr>
                                        <td style="padding: 5px;"><u>MOTOR</u></td>
                                        <td style="padding: 5px;">L2</td>
                                        <td style="padding: 5px;">L3</td>
                                        <td style="padding: 5px;">L4</td>
                                        <td style="padding: 5px;">LS</td>
                                        <td style="padding: 5px;">51</td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px;">Right</td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right1"]); ?>" name="right1" id="right1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right2"]); ?>" name="right2" id="right2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right3"]); ?>" name="right3" id="right3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right4"]); ?>" name="right4" id="right4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right5"]); ?>" name="right5" id="right5" style="width:25px"></td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px;">Left</td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left1"]); ?>" name="left1" id="left1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left2"]); ?>" name="left2" id="left2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left3"]); ?>" name="left3" id="left3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left4"]); ?>" name="left4" id="left4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left5"]); ?>" name="left5" id="left5" style="width:25px"></td>
                                   </tr>
                              </table>
                         </div>
                         <div class="col-6">
                              <table class="table-bordered">
                                   <tr>
                                        <td style="padding: 5px;"><u>SENSORY</u></td>
                                        <td style="padding: 5px;">L2</td>
                                        <td style="padding: 5px;">L3</td>
                                        <td style="padding: 5px;">L4</td>
                                        <td style="padding: 5px;">LS</td>
                                        <td style="padding: 5px;">51</td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px;">Right</td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right_s1"]); ?>" name="right_s1" id="right_s1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right_s2"]); ?>" name="right_s2" id="right_s2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right_s3"]); ?>" name="right_s3" id="right_s3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right_s4"]); ?>" name="right_s4" id="right_s4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["right_s5"]); ?>" name="right_s5" id="right_s5" style="width:25px"></td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px;">Left</td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left_s1"]); ?>" name="left_s1" id="left_s1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left_s2"]); ?>" name="left_s2" id="left_s2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left_s3"]); ?>" name="left_s3" id="left_s3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left_s4"]); ?>" name="left_s4" id="left_s4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["left_s5"]); ?>" name="left_s5" id="left_s5" style="width:25px"></td>
                                   </tr>
                              </table>
                         </div>
                    </div>
               </div>

          </div>
        </div>

<br><br>

<div class='row'>
     <div class='col-6'>
               <h4>Physical Exam</h4>
          <div class="title">Gail:</div>
          <input type="checkbox" <?php echo ($check_res["normal_gail"] == 1) ? "checked" : ""; ?> name="normal_gail" id="normal_gail" class="common_class">Normal&emsp;&emsp;&emsp;&emsp;
           <input type="checkbox" <?php echo ($check_res["antalgic_gail"] == 1) ? "checked" : ""; ?> name="antalgic_gail" id="antalgic_gail" class="common_class">Antalgic<br>

          <div class="title">Hamstring:</div>
          <input type="checkbox" <?php echo ($check_res["normal_hamstring"] == 1) ? "checked" : ""; ?> name="normal_hamstring" id="normal_hamstring" class="common_class">Normal
          &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["contracture_hamstring"] == 1) ? "checked" : ""; ?> name="contracture_hamstring" id="contracture_hamstring" class="common_class">Contracture&emsp;&emsp;&emsp;&emsp; L/R/B<br>

          <div class="title">Ischial Tuberosity:</div>
          <input type="checkbox" <?php echo ($check_res["normal_ischial"] == 1) ? "checked" : ""; ?> name="normal_ischial" id="normal_ischial" class="common_class">normal &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["tend_ischial"] == 1) ? "checked" : ""; ?> name="tend_ischial" class="tend_ischial" id="tend_ischial" class="common_class">
          tenderness &emsp;&emsp;&emsp;&emsp;  L/R/B<br>
          <div class="title">ITB:</div>
          <input type="checkbox" <?php echo ($check_res["normal_itb"] == 1) ? "checked" : ""; ?> name="normal_itb" id="normal_itb" class="common_class">normal&emsp;&emsp;&emsp;&emsp; 
          <input type="checkbox" <?php echo ($check_res["tend_itb"] == 1) ? "checked" : ""; ?> name="tend_itb" class="common_class" id="tend_itb"> tenderness  L/R/B<br>
          <div class="title">Straight leg raise:</div>
          <input type="checkbox" <?php echo ($check_res["normal_leg"] == 1) ? "checked" : ""; ?> name="normal_leg" id="normal_leg" class="common_class">normal &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_leg"] == 1) ? "checked" : ""; ?> name="positive_leg" class="common_class" id="positive_leg" > positive  L/R/B<br>
          <div class="title">Piriformise:</div><input type="checkbox" <?php echo ($check_res["normal_piriformise"] == 1) ? "checked" : ""; ?> name="normal_piriformise" id="normal_piriformise" class="common_class">normal &emsp;&emsp;&emsp;&emsp; <input type="checkbox" <?php echo ($check_res["tend_piriformise"] == 1) ? "checked" : ""; ?> name="tend_piriformise" id="tend_piriformise" class="common_class"> tenderness  L/R/B<br>
          <div class="title">Pulses:</div>
          <input type="checkbox" <?php echo ($check_res["normal_pulse"] == 1) ? "checked" : ""; ?> name="normal_pulse" id="normal_pulse" class="common_class">normal&emsp;&emsp;&emsp;&emsp; 
          <input type="checkbox" <?php echo ($check_res["tend_pulse"] == 1) ? "checked" : ""; ?> name="tend_pulse" class="common_class" id="tend_pulse" class="common_class">tenderness &emsp;&emsp;&emsp;&emsp; L/R/B<br>
          <div class="title">Trochanter:</div>
          <input type="checkbox" <?php echo ($check_res["normal_troch"] == 1) ? "checked" : ""; ?> name="normal_troch" id="normal_troch" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["tend_troch"] == 1) ? "checked" : ""; ?> name="tend_troch" class="common_class" id="tend_troch" class="common_class">tenderness &emsp;&emsp;&emsp;&emsp; L/R/B<br>
          <div class="title">Sl joint:</div>
          <input type="checkbox" <?php echo ($check_res["normal_sl"] == 1) ? "checked" : ""; ?> name="normal_sl" id="normal_sl" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_sl"] == 1) ? "checked" : ""; ?> name="positive_sl" class="common_class" id="positive_sl" class="common_class">positive <br>
          <div class="title">Facet loading:</div>
          <input type="checkbox" <?php echo ($check_res["normal_facet"] == 1) ? "checked" : ""; ?> name="normal_facet" id="normal_facet" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_facet"] == 1) ? "checked" : ""; ?> name="positive_facet" class="common_class" id="positive_facet" class="common_class">positive&emsp;&emsp;&emsp;&emsp;  L/R/B<br>
          <div class="title">Muscle Spasms:</div>
          <input type="checkbox" <?php echo ($check_res["normal_muscle"] == 1) ? "checked" : ""; ?> name="normal_muscle" id="normal_muscle" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_muscle"] == 1) ? "checked" : ""; ?> name="positive_muscle" class="common_class" id="positive_muscle" class="common_class">positive &emsp;&emsp;&emsp;&emsp; L/R/B<br>
          
     </div>
     <div class='col-6'>
          <div class='row'>
               <div class='col-6'>
                    <table border="1px" style="border-collapse:collapse;width: 400px;margin-left: -150px;">
                    <tr>
                         <th>Tone</th>
                         <th>Patella</th>
                         <th>Ankle</th>
                    </tr>
                    <tr>
                         <td>Right</td>
                         <td style="padding: 5px;" style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["Patella_right1"]); ?>" name="Patella_right1" id="Patella_right1"></td>
                         <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["Patella_right2"]); ?>" name="Patella_right2" id="Patella_right2"></td>
                    </tr>
                    <tr>
                         <td>Left</td>
                         <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["Ankle_left1"]); ?>" name="Ankle_left1" id="Ankle_left1"></td>
                         <td style="padding: 5px;"><input type="text" value="<?php echo attr($check_res["Ankle_left2"]); ?>" name="Ankle_left2" id="Ankle_left2"></td>
                    </tr>
                    </table>
               </div>
               <div class='col-6'>
                    <div style="border:1px solid black;padding: 7px;">
                         <p style="text-decoration: underline;">Discogenic Pain:</p>
                              <label>L1-2</label>&nbsp;&nbsp;
                              <label>L2-3</label>&nbsp;&nbsp;
                              <label>L3-4</label>&nbsp;&nbsp;
                              <label>L4-5</label>&nbsp;&nbsp;
                              <label>L5-S1</label>
                         <p style="text-decoration: underline;">Facet Pain:</p>
                         <table>
                              <tr>
                                   <td>R &ensp;</td>
                                   <td>L1-2 &ensp;</td>
                                   <td>L2-3 &ensp;</td>
                                   <td>L3-4 &ensp;</td>
                                   <td>L4-5 &ensp;</td>
                                   <td>L5-S1</td>
                              </tr>
                              <tr>
                                   <td>L &ensp;</td>
                                   <td>L1-2 &ensp;</td>
                                   <td>L2-3 &ensp;</td>
                                   <td>L3-4 &ensp;</td>
                                   <td>L4-5 &ensp;</td>
                                   <td>L5-S1</td>
                              </tr>
                         </table>
                    </div>
               </div>
     </div>
          <br>
        
       <div style="border:1px solid black;padding:5px 10px;margin-left: -150px;">
        <input type="checkbox" <?php echo ($check_res["hip_check"] == 1) ? "checked" : ""; ?> id="hip_check" name= "hip_check" >Hip pain: R &ensp; L &ensp;B &emsp;
        <input type="checkbox" <?php echo ($check_res["knee_check"] == 1) ? "checked" : ""; ?> id="knee_check" name= "knee_check">Knee pain: R &ensp; L &ensp; B &emsp;
        <input type="checkbox" <?php echo ($check_res["shoulder_check"] == 1) ? "checked" : ""; ?> id="shoulder_check" name= "shoulder_check">Shoulder: R &ensp; L &ensp; B
       </div><br>
          </div>
     </div>
</div>

<br><br>
        <div class="row">
          <div class="col-6">
               <div class="" style="border:1px solid;font-weight:bold;padding-left:10px"> 
                    * Surgery Recommendation w/ Dr.Deuk for:<br> DLDR <br>
                    R &emsp; L1-2  &emsp; L2-3 &emsp; L3-4 &emsp; L4-5 &emsp; L5-S1 <br>
                    L &emsp; L1-2  &emsp; L2-3 &emsp; L3-4 &emsp; L4-5 &emsp; L5-S1 <br><br>
                    DPR <br>
                    R &emsp; L1-2  &emsp; L2-3 &emsp; L3-4 &emsp; L4-5 &emsp; L5-S1 <br>
                    L &emsp; L1-2  &emsp; L2-3 &emsp; L3-4 &emsp; L4-5 &emsp; L5-S1 <br><br>
                    * LMBB/RFA w/ Dr.Patel or Dr Francischini :<br>
                    R &emsp; L1-2  &emsp; L2-3 &emsp; L3-4 &emsp; L4-5 &emsp; L5-S1 <br>
                    L &emsp; L1-2  &emsp; L2-3 &emsp; L3-4 &emsp; L4-5 &emsp; L5-S1 <br><br>

               </div>
               <br><br>
               <b> A/P 1. <input type="text" value="<?php echo attr($check_res["ap1"]); ?>" name="ap1" id="ap1" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;2. <input type="text" value="<?php echo attr($check_res["ap2"]); ?>" name="ap2" id="ap2" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;3. <input type="text" value="<?php echo attr($check_res["ap3"]); ?>" name="ap3" id="ap3" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;4. <input type="text" value="<?php echo attr($check_res["ap4"]); ?>" name="ap4" id="ap4" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;s. <input type="text" value="<?php echo attr($check_res["ap5"]); ?>" name="ap5" id="ap5" style="width:85%;">

               </b>
          </div>
          <div class="col-6">
           <div class="" style="border:1px solid;font-weight:bold;padding-left:10px"> 
               <input type="checkbox" <?php echo ($check_res["check1"] == 1) ? "checked" : ""; ?> name="check1" id="check1">&ensp; Lumbago with sciatica, Right side (M54.41) <br>
               <input type="checkbox" <?php echo ($check_res["check2"] == 1) ? "checked" : ""; ?> name="check2" id="check2">&ensp; Lumbago with sciatica, Left side (M54.42)<br>
               <input type="checkbox" <?php echo ($check_res["check3"] == 1) ? "checked" : ""; ?> name="check3" id="check3">&ensp; Sciatica Right side (M54.31)<br>
               <input type="checkbox" <?php echo ($check_res["check4"] == 1) ? "checked" : ""; ?> name="check4" id="check4">&ensp; Sciatica Left side (M54.32)<br>
               <input type="checkbox" <?php echo ($check_res["check5"] == 1) ? "checked" : ""; ?> name="check5" id="check5">&ensp; Radiculopathy I Radiculitis Lumbar (M54.16)<br>
               <input type="checkbox" <?php echo ($check_res["check6"] == 1) ? "checked" : ""; ?> name="check6" id="check6">&ensp;  Facet Syndrome, Lumbar (M53.86)<br>
               <input type="checkbox" <?php echo ($check_res["check7"] == 1) ? "checked" : ""; ?> name="check7" id="check7">&ensp;  HNP/ bulge lumbar w/o myelopathy/radiculopathy (M51.26)<br>
               <input type="checkbox" <?php echo ($check_res["check8"] == 1) ? "checked" : ""; ?> name="check8" id="check8">&ensp;  HNP/disc bulge lumbar w/radiculopathy (M51.16)<br>
               <input type="checkbox" <?php echo ($check_res["check9"] == 1) ? "checked" : ""; ?> name="check9" id="check9">&ensp;  Sprain/Strain  Lumb subseq encounter (S33.5XXA)<br>
               <input type="checkbox" <?php echo ($check_res["check10"] == 1) ? "checked" : ""; ?> name="check10" id="check10">&ensp; Knee pain RT (M25.561) LT (M25.562)<br>
               <input type="checkbox" <?php echo ($check_res["check11"] == 1) ? "checked" : ""; ?> name="check11" id="check11">&ensp; Hip pain	RT (M25.551) ILT (M25.552)<br>
               <input type="checkbox" <?php echo ($check_res["check12"] == 1) ? "checked" : ""; ?> name="check12" id="check12">&ensp; Trochanteric bursitis   RT (M70.61)  I LT (M70.62)<br>
               <input type="checkbox" <?php echo ($check_res["check13"] == 1) ? "checked" : ""; ?> name="check13" id="check13">&ensp;  Annular tear Lumbar (M51.86)<br>
               <input type="checkbox" <?php echo ($check_res["check14"] == 1) ? "checked" : ""; ?> name="check14" id="check14">&ensp; Drop Foot, RT (M21.371) D Drop Foot, LT (M21.372)<br>
               <input type="checkbox" <?php echo ($check_res["check15"] == 1) ? "checked" : ""; ?> name="check15" id="check15">&ensp;  Hx of check16 Fusion (M43.26)<br>
               <input type="checkbox" <?php echo ($check_res["check16"] == 1) ? "checked" : ""; ?> name="check16" id="check16">&ensp;  M51.A2 lntervertebral annulus fibrosus, large, lumbar region<br>
               <input type="checkbox" <?php echo ($check_res["check17"] == 1) ? "checked" : ""; ?> name="check17" id="check17">&ensp; M51.A5 lntervertebral annulus fibrosus defect, large, lumbarsacral region
           </div>
          <br>
           <div style="border:1px solid;padding-left:10px;padding-bottom:5px;">
               <b >
               Dr. Deuk	&emsp;&emsp;&emsp; <input type="text" value="<?php echo attr($check_res["sign1"]); ?>" name="sign1" id="sign1" style="width:45%;"><br>
               Dr. DeMola &emsp;&emsp;&emsp;<input type="text" value="<?php echo attr($check_res["sign2"]); ?>" name="sign2" id="sign2" style="width:45%;"><br>
               <br><br>
               <label align='center' style="width:100%;"><input type="text" value="<?php echo attr($check_res["pat_label"]); ?>" name="pat_label" id="pat_label" style="width:85%;"><br>Patient Label</label>
               </b>
           </div>
        </div>
        <div class="btndiv" style="vertical-align:center">
          <input type="submit" name="sub" value="Submit" class="subbtn">
          <button class="cancel" type="button"  onclick="top.restoreSession(); parent.closeTab(window.name, false);"><?php echo xlt('Cancel');?></button>
        </div>
</form>

</div>
</div>
</div>
</body>
</html>