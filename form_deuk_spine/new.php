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
               <div class="col-5" style="font-size:14px">
               <input type="hidden" name="pos" id="pos" value="<?php echo attr($check_res["pos"]); ?>" >
                    <label style="border: 1px solid;padding:2px"> pain: 
                    <input type="radio" name="pain" class="pain" id="pain1" value = "X"> &ensp; X  Numbness &emsp;
                    <input type="radio" name="pain" class="pain" id="pain2" value = "O"> &ensp; O Weekness&emsp;
                    <input type="radio" name="pain" class="pain" id="pain3" value = "*"> &ensp; * pins & needles
                    </label>     
          </div>
          <div class="col-3">DOS <input type="date" value="<?php echo attr($check_res["dos"]); ?>" name="dos" id="dos"></div>
          <div class="col-4">
               Room #:  <input type="text" value="<?php echo attr($check_res["room_no"]); ?>" name="room_no" id="room_no"><br>
               Insurance : <input type="text" value="<?php echo attr($check_res["ins_num"]); ?>" name="ins_num" id="ins_num"><br>
               MA  Initials : <input type="text" value="<?php echo attr($check_res["ma_ins"]); ?>" name="ma_ins" id="ma_ins">     
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-5" align="center">
               <img src="../../forms/form_deuk_spine/deuk.png" alt="form_deuk_spine" style="width:80%;cursor:pointer">
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
                                        <td style="padding: 5px;">S1</td>
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
                                        <td style="padding: 5px;">S1</td>
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
          <input type="checkbox" <?php echo ($check_res["contracture_hamstring"] == 1) ? "checked" : ""; ?> name="contracture_hamstring" id="contracture_hamstring" class="common_class">Contracture&emsp;&emsp;&emsp;&emsp; 
          <select name="check2" id="check2" value = '<?php echo attr($check_res["check2"])? $check_res["check2"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check2"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check2"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check2"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>

          <div class="title">Ischial Tuberosity:</div>
          <input type="checkbox" <?php echo ($check_res["normal_ischial"] == 1) ? "checked" : ""; ?> name="normal_ischial" id="normal_ischial" class="common_class">normal &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["tend_ischial"] == 1) ? "checked" : ""; ?> name="tend_ischial" class="tend_ischial" id="tend_ischial" class="common_class">
          tenderness &emsp;&emsp;&emsp;&emsp;  
          <select name="check3" id="check3" value = '<?php echo attr($check_res["check3"])? $check_res["check3"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check3"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check3"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check3"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          <div class="title">ITB:</div>
          <input type="checkbox" <?php echo ($check_res["normal_itb"] == 1) ? "checked" : ""; ?> name="normal_itb" id="normal_itb" class="common_class">normal&emsp;&emsp;&emsp;&emsp; 
          <input type="checkbox" <?php echo ($check_res["tend_itb"] == 1) ? "checked" : ""; ?> name="tend_itb" class="common_class" id="tend_itb"> tenderness  &emsp;&emsp;&emsp;&emsp;
          <select name="check4" id="check4" value = '<?php echo attr($check_res["check4"])? $check_res["check4"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check4"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check4"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check4"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          <div class="title">Straight leg raise:</div>
          <input type="checkbox" <?php echo ($check_res["normal_leg"] == 1) ? "checked" : ""; ?> name="normal_leg" id="normal_leg" class="common_class">normal &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_leg"] == 1) ? "checked" : ""; ?> name="positive_leg" class="common_class" id="positive_leg" > positive  &emsp;&emsp;&emsp;&emsp;

          <select name="check5" id="check5" value = '<?php echo attr($check_res["check5"])? $check_res["check5"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check5"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check5"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check5"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          <div class="title">Piriformise:</div><input type="checkbox" <?php echo ($check_res["normal_piriformise"] == 1) ? "checked" : ""; ?> name="normal_piriformise" id="normal_piriformise" class="common_class">normal &emsp;&emsp;&emsp;&emsp; <input type="checkbox" <?php echo ($check_res["tend_piriformise"] == 1) ? "checked" : ""; ?> name="tend_piriformise" id="tend_piriformise" class="common_class"> tenderness  &emsp;&emsp;&emsp;&emsp;
          <select name="check6" id="check6" value = '<?php echo attr($check_res["check6"])? $check_res["check6"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check6"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check6"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check6"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          <div class="title">Pulses:</div>
          <input type="checkbox" <?php echo ($check_res["normal_pulse"] == 1) ? "checked" : ""; ?> name="normal_pulse" id="normal_pulse" class="common_class">normal&emsp;&emsp;&emsp;&emsp; 
          <input type="checkbox" <?php echo ($check_res["tend_pulse"] == 1) ? "checked" : ""; ?> name="tend_pulse" class="common_class" id="tend_pulse" class="common_class">tenderness &emsp;&emsp;&emsp;&emsp; 
          <select name="check7" id="check7" value = '<?php echo attr($check_res["check7"])? $check_res["check7"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check7"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check7"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check7"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          <div class="title">Trochanter:</div>
          <input type="checkbox" <?php echo ($check_res["normal_troch"] == 1) ? "checked" : ""; ?> name="normal_troch" id="normal_troch" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["tend_troch"] == 1) ? "checked" : ""; ?> name="tend_troch" class="common_class" id="tend_troch" class="common_class">tenderness &emsp;&emsp;&emsp;&emsp; 
          <select name="check8" id="check8" value = '<?php echo attr($check_res["check8"])? $check_res["check8"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check8"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check8"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check8"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          <div class="title">Sl joint:</div>
          <input type="checkbox" <?php echo ($check_res["normal_sl"] == 1) ? "checked" : ""; ?> name="normal_sl" id="normal_sl" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_sl"] == 1) ? "checked" : ""; ?> name="positive_sl" class="common_class" id="positive_sl" class="common_class">tenderness &emsp;&emsp;&emsp;  
          <select name="check9" id="check9" value = '<?php echo attr($check_res["check9"])? $check_res["check9"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check9"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check9"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check9"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          <div class="title">Facet loading:</div>
          <input type="checkbox" <?php echo ($check_res["normal_facet"] == 1) ? "checked" : ""; ?> name="normal_facet" id="normal_facet" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_facet"] == 1) ? "checked" : ""; ?> name="positive_facet" class="common_class" id="positive_facet" class="common_class">positive<br>
          <div class="title">Muscle Spasms:</div>
          <input type="checkbox" <?php echo ($check_res["normal_muscle"] == 1) ? "checked" : ""; ?> name="normal_muscle" id="normal_muscle" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" <?php echo ($check_res["positive_muscle"] == 1) ? "checked" : ""; ?> name="positive_muscle" class="common_class" id="positive_muscle" class="common_class">positive &emsp;&emsp;&emsp;&emsp; 
          <select name="check10" id="check10" value = '<?php echo attr($check_res["check10"])? $check_res["check10"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check10"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check10"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check10"] == 'B') ? "selected" : ""; ?> >B</option>
          </select><br>
          
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
                         <select name="check11" id="check11" value = '<?php echo attr($check_res["check11"])? $check_res["check11"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check11"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check11"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check11"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check11"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check11"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                         </select> <br>
                         <p style="text-decoration: underline;">Facet Pain:</p>
                         
                              R &ensp;
                              <select name="check12" id="check12" value = '<?php echo attr($check_res["check12"])? $check_res["check12"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check12"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check12"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check12"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check12"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check12"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                              </select> &emsp;&emsp;
                              
                                   L &ensp;
                              <select name="check13" id="check13" value = '<?php echo attr($check_res["check13"])? $check_res["check13"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check13"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check13"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check13"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check13"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check13"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                                   </select> <br>
                              </tr>
                         </table>
                    </div>
               </div>
     </div>
          <br>
        
       <div style="border:1px solid black;padding:5px 10px;margin-left: -150px;">
        <input type="checkbox" <?php echo ($check_res["hip_check"] == 1) ? "checked" : ""; ?> id="hip_check" name= "hip_check" >Hip pain: 
        
        <select name="check20" id="check20" value = '<?php echo attr($check_res["check20"])? $check_res["check20"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check20"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check20"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check20"] == 'B') ? "selected" : ""; ?> >B</option>
          </select>

        &emsp;
        <input type="checkbox" <?php echo ($check_res["knee_check"] == 1) ? "checked" : ""; ?> id="knee_check" name= "knee_check">Knee pain: 
        
        <select name="check21" id="check21" value = '<?php echo attr($check_res["check21"])? $check_res["check21"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check21"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check21"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check21"] == 'B') ? "selected" : ""; ?> >B</option>
          </select>
        &emsp;
        <input type="checkbox" <?php echo ($check_res["shoulder_check"] == 1) ? "checked" : ""; ?> id="shoulder_check" name= "shoulder_check">Shoulder: 
        
        <select name="check22" id="check22" value = '<?php echo attr($check_res["check22"])? $check_res["check22"] : ""; ?>' >
               <option value="L" <?php echo attr($check_res["check22"] == 'L') ? "selected" : ""; ?> >L</option>
               <option value="R" <?php echo attr($check_res["check22"] == 'R') ? "selected" : ""; ?> >R</option>
               <option value="B" <?php echo attr($check_res["check22"] == 'B') ? "selected" : ""; ?> >B</option>
          </select>
       </div><br>
          </div>
     </div>
</div>

<br><br>
        <div class="row" style="padding: 20px;">
          <div class="col-6">
               <div class="" style="border:1px solid;font-weight:bold;padding-left:10px"> 
                    * Surgery Recommendation w/ Dr.Deuk for:<br> DLDR <br>
                    R &ensp;
                    <select name="check14" id="check14" value = '<?php echo attr($check_res["check14"])? $check_res["check14"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check14"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check14"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check14"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check14"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check14"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                    </select> &emsp;&emsp;&emsp;
                    L &ensp; 
                    <select name="check15" id="check15" value = '<?php echo attr($check_res["check15"])? $check_res["check15"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check15"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check15"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check15"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check15"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check15"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                    </select> <br> <br>
                    DPR <br>
                    R &ensp; 
                    <select name="check16" id="check16" value = '<?php echo attr($check_res["check16"])? $check_res["check16"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check16"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check16"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check16"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check16"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check16"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                    </select> &emsp;&emsp;&emsp;
                    L &ensp; 
                    <select name="check17" id="check17" value = '<?php echo attr($check_res["check17"])? $check_res["check17"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check17"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check17"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check17"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check17"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check17"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                    </select> <br> <br>
                    * LMBB/RFA w/ Dr.Patel or Dr Franceschini :<br>
                    R &ensp;
                    <select name="check18" id="check18" value = '<?php echo attr($check_res["check18"])? $check_res["check18"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check18"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check18"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check18"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check18"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check18"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                    </select> &emsp;&emsp;&emsp;
                    L &ensp; 
                    <select name="check19" id="check19" value = '<?php echo attr($check_res["check19"])? $check_res["check19"] : ""; ?>' >
                              <option value="L1-2" <?php echo attr($check_res["check19"] == 'L1-2') ? "selected" : ""; ?> >L1-2</option>
                              <option value="L2-3" <?php echo attr($check_res["check19"] == 'L2-3') ? "selected" : ""; ?> >L2-3</option>
                              <option value="L3-4" <?php echo attr($check_res["check19"] == 'L3-4') ? "selected" : ""; ?> >L3-4</option>
                              <option value="L4-5" <?php echo attr($check_res["check19"] == 'L4-5') ? "selected" : ""; ?> >L4-5</option>
                              <option value="L5-S1" <?php echo attr($check_res["check19"] == 'L5-S1') ? "selected" : ""; ?> >L5-S1</option>
                    </select> <br> <br>

               </div>
               <br><br>
               <b> A/P 1. <input type="text" value="<?php echo attr($check_res["ap1"]); ?>" name="ap1" id="ap1" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp; 2. <input type="text" value="<?php echo attr($check_res["ap2"]); ?>" name="ap2" id="ap2" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp; 3. <input type="text" value="<?php echo attr($check_res["ap3"]); ?>" name="ap3" id="ap3" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp; 4. <input type="text" value="<?php echo attr($check_res["ap4"]); ?>" name="ap4" id="ap4" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp; 5. <input type="text" value="<?php echo attr($check_res["ap5"]); ?>" name="ap5" id="ap5" style="width:85%;">

               </b>
          </div>
          <div class="col-6">
           <div style="border:1px solid;font-weight:bold;padding-left:10px"> 
               <input type="radio" <?php echo ($check_res["check1"] == 1) ? "checked" : ""; ?> name="check1" value="1" id="check1" <?php echo ($check_res["check1"] == 1) ? "checked" : ""; ?> >&ensp; Lumbago with sciatica, Right side (M54.41) <br>
               <input type="radio"  name="check1" id="check2" value="2" <?php echo ($check_res["check1"] == 2) ? "checked" : ""; ?>>&ensp; Lumbago with sciatica, Left side (M54.42)<br>
               <input type="radio"  name="check1" id="check3" value="3" <?php echo ($check_res["check1"] == 3) ? "checked" : ""; ?>>&ensp; Sciatica Right side (M54.31)<br>
               <input type="radio"  name="check1" id="check4" value="4" <?php echo ($check_res["check1"] == 4) ? "checked" : ""; ?>>&ensp; Sciatica Left side (M54.32)<br>
               <input type="radio"  name="check1" id="check5" value="5" <?php echo ($check_res["check1"] == 5) ? "checked" : ""; ?>>&ensp; Radiculopathy / Radiculitis Lumbar (M54.16)<br>
               <input type="radio"  name="check1" id="check6" value="6" <?php echo ($check_res["check1"] == 6) ? "checked" : ""; ?>>&ensp;  Facet Syndrome, Lumbar (M53.86)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 7) ? "checked" : ""; ?> name="check1" id="check7" value="7">&ensp;  HNP/ bulge lumbar w/o myelopathy  / radiculopathy (M51.26)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 8) ? "checked" : ""; ?> name="check1" value="8" id="check8">&ensp;  HNP/disc bulge lumbar w/radiculopathy (M51.16)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 9) ? "checked" : ""; ?> name="check1" value="9" id="check9">&ensp;  Sprain/Strain  Lumb subseq encounter (S33.5XXA)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 10) ? "checked" : ""; ?> name="check1" value="10" id="check10">&ensp; Knee pain RT (M25.561) LT (M25.562)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 11) ? "checked" : ""; ?> name="check1" value="11" id="check11">&ensp; Hip pain RT (M25.551) LT (M25.552)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 12) ? "checked" : ""; ?> name="check1" value="12" id="check12">&ensp; Trochanteric bursitis  RT (M70.61) / LT (M70.62)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 13) ? "checked" : ""; ?> name="check1" value="13" id="check13">&ensp;  Annular tear Lumbar (M51.86)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 14) ? "checked" : ""; ?> name="check1" value="14" id="check14">&ensp; Drop Foot, RT (M21.371) &ensp;&ensp; 
               <input type="radio" <?php echo ($check_res["check1"] == '14a') ? "checked" : ""; ?> name="check1" value="14a" id="check14a">&ensp; Drop Foot, LT (M21.372)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 15) ? "checked" : ""; ?> name="check1" value="15" id="check15">&ensp;  Hx of check16 Fusion (M43.26)<br>
               <input type="radio" <?php echo ($check_res["check1"] == 16) ? "checked" : ""; ?> name="check1" value="16" id="check16">&ensp;  M51.A2 lntervertebral annulus fibrosus, large, lumbar region<br>
               <input type="radio" <?php echo ($check_res["check1"] == 17) ? "checked" : ""; ?> name="check1" value="17" id="check17">&ensp; M51.A5 lntervertebral annulus fibrosus defect, large, lumbarsacral region
           </div>
          <br>
           <div style="border:1px solid;padding-left:10px;padding-bottom:5px;">
               <b >
               Dr. Deuk	&emsp;&emsp;&emsp; <input type="text" value="<?php echo attr($check_res["sign1"]); ?>" name="sign1" id="sign1" style="width:45%;"><br>
               Dr. DeMola &emsp;&emsp;&emsp;<input type="text" value="<?php echo attr($check_res["sign2"]); ?>" name="sign2" id="sign2" style="width:45%;"><br>
               <br><br>
               <!-- <label align='center' style="width:100%;"><input type="text" value="<?php echo attr($check_res["pat_label"]); ?>" name="pat_label" id="pat_label" style="width:85%;"><br>Patient Label</label> -->
               </b>
           </div>
        </div>
        <div class="btndiv" style="margin-left: 500px;margin-top:25px;">
          <input type="submit" name="sub" value="Submit" class="subbtn">
          <button class="cancel" type="button"  onclick="top.restoreSession(); parent.closeTab(window.name, false);"><?php echo xlt('Cancel');?></button>
        </div>
</form>

</div>
</div>
</div>
</body>
<script>
     $(document).ready(function(){ 


               var count = 1;
               var pos = $('#pos').val() ;
               if(pos){
                    var mark = pos.split('|');
                    var cnt = mark.length;
                    while(count <cnt){
                         var marks = mark[count-1].split(',');
                         
                         $("body").append(
                         $('<div class="marker" id="'+count+'" style="cursor:pointer;"></div>').text(marks[2]).css({
                              position: 'absolute',
                              top: marks[0] + 'px',
                              left: marks[1] + 'px',
                              'font-weight': 'bold',
                              'font-size':'15px',
                              color:'red'
                         }) 
                    ) ;
                         count+=1;
                    }
               } 
    $('img').click(function (ev) {
       if($('.pain').is(':checked')){
                   var pain = $('.pain:checked').val();
          $("body").append(    
       
                $('<div class="marker" id="'+count+'" style="cursor:pointer;"></div>').text(pain).css({
                    position: 'absolute',
                    top: ev.pageY + 'px',
                    left: ev.pageX + 'px',
                    'font-weight': 'bold',
                    'font-size':'15px',
                     color:'red'
                })              
          );
          var pos = $('#pos').val() ;
          pos = pos+ ev.pageY+','+ev.pageX+','+pain+'|';
          $('#pos').val(pos);
       } else{
          alert('Please choose one of them above! ')
       }
     });
     });
     $(document).on('click', '.marker', function (ev) {
               $(this).remove();
               var remove_val = $(this).css('top') + ',' +$(this).css('left')+ ',' +$(this).text()+'|';
               remove_val = remove_val.replaceAll('px','');
               var pos = $('#pos').val();
               $('#pos').val($('#pos').val().replace(remove_val, ""));

     });
</script>
</html>