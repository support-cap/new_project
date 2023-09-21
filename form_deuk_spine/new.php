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
      $sql = "SELECT * FROM `form_beck_depression_inventory` WHERE id=? AND pid = ? AND encounter = ?";
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
        <form method="post" name="my_form" action="<?php echo $rootdir; ?>/customized/form_deuk_spine/save.php?id=<?php echo attr_url($formid); ?>">
        <h4 align="center" style="width:100%;">Deuk Spine Institute Consultation</h4>
        <div class="row">
          <div class="col-3">
                 <label style="border: 1px solid;padding:2px"> pain: X Numbness :O Weekness : /pins & needles: * </label>      
          </div>
          <div class="col-3"> Lumbar <input type="text" name="lumbar" id="lumbar"></div>
          <div class="col-3">DOS <input type="date" name="dos" id="dos"></div>
          <div class="col-3">
              <div> Room #:  <input type="text" name="room_no" id="room_no"></div><br>
              <div> Insurance : <input type="text" name="ins_num" id="ins_num"></div><br>
              <div> MA  Initials : <input type="text" name="ma_ins" id="ma_ins"></div>     
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-5" align="center">
               <img src="../../customized/form_deuk_spine/deuk.png" alt="form_deuk_spine" style="width:80%">
          </div>
          <div class="col-6">
               Last Visit: <input type="date" name="last_visit" id="last_visit" style="width:80%"><br>
               CC: <input type="text" name="cc" id="cc" style="width:80%"><br>
               Hx: <input type="text" name="hx" id="hx" style="width:80%"><br><br>
               My Pain(1-10) is :  &emsp;
               Worst : <input type="text" name="Worst" id="Worst"  style="width:25px" maxlength=2> /10 &emsp; 
               Average : <input type="text" name="Average" id="Average" style="width:25px" maxlength=2> /10 &emsp;
               Best : <input type="text" name="Best" id="Best" style="width:25px" maxlength=2> /10 <br><br>
          <div class="row">
               <div class = "col-6">
                    <div style="padding : 5px;border:1px solid"> Vitals : BP :<input type="text" name="bp1" id="bp1" style="width:25px" maxlength=3> / <input type="text" name="bp2" id="bp2" style="width:25px" maxlength=2> &emsp; HR : <input type="text" name="hrs" id="hrs"  style="width:25px"maxlength=2>  &emsp; O2% : <input type="text"  style="width:25px"name="o2" id="o2" maxlength=3> </div>
               </div>
                    <div class = "col-6">
                         <div style="padding : 5px;border:1px solid">
                              LBP  : <input type="text" name="lbp" id="lbp" style="width:25px" maxlength=3> % &emsp;
                              LEP  : <input type="text" name="lep" id="lep" style="width:25px" maxlength=3> %
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
                                        <td style="padding: 5px;"><input type="text" name="right1" id="right1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right2" id="right2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right3" id="right3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right4" id="right4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right5" id="right5" style="width:25px"></td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px;">Left</td>
                                        <td style="padding: 5px;"><input type="text" name="left1" id="left1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left2" id="left2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left3" id="left3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left4" id="left4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left5" id="left5" style="width:25px"></td>
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
                                        <td style="padding: 5px;"><input type="text" name="right_s1" id="right_s1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right_s2" id="right_s2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right_s3" id="right_s3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right_s4" id="right_s4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="right_s5" id="right_s5" style="width:25px"></td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px;">Left</td>
                                        <td style="padding: 5px;"><input type="text" name="left_s1" id="left_s1" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left_s2" id="left_s2" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left_s3" id="left_s3" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left_s4" id="left_s4" style="width:25px"></td>
                                        <td style="padding: 5px;"><input type="text" name="left_s5" id="left_s5" style="width:25px"></td>
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
          <input type="checkbox" name="gail" id="normal_gail" class="common_class">Normal&emsp;&emsp;&emsp;&emsp;
           <input type="checkbox" name="gail" id="antalgic_gail" class="common_class">Antalgic<br>

          <div class="title">Hamstring:</div>
          <input type="checkbox" name="hamstring" id="normal_hamstring" class="common_class">Normal
          &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" name="hamstring" id="contracture_hamstring" class="common_class">Contracture&emsp;&emsp;&emsp;&emsp; L/R/B<br>
          <div class="title">Ischial Tuberosity:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class">
          tenderness &emsp;&emsp;&emsp;&emsp;  L/R/B<br>
          <div class="title">ITB:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal&emsp;&emsp;&emsp;&emsp; 
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class"> tenderness  L/R/B<br>
          <div class="title">Straight leg raise:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal &emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class"> positive  L/R/B<br>
          <div class="title">Piriformise:</div><input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal &emsp;&emsp;&emsp;&emsp; <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class"> tenderness  L/R/B<br>
          <div class="title">Pulses:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal&emsp;&emsp;&emsp;&emsp; 
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class">tenderness &emsp;&emsp;&emsp;&emsp; L/R/B<br>
          <div class="title">Trochanter:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class">tenderness &emsp;&emsp;&emsp;&emsp; L/R/B<br>
          <div class="title">Sl joint:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class">positive <br>
          <div class="title">Facet loading:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class">positive&emsp;&emsp;&emsp;&emsp;  L/R/B<br>
          <div class="title">Muscle Spasms:</div>
          <input type="checkbox" name="normal_gail" id="normal_gail" class="common_class">normal&emsp;&emsp;&emsp;&emsp;
          <input type="checkbox" name="normal_gail" class="common_class" id="normal_gail" class="common_class">positive &emsp;&emsp;&emsp;&emsp; L/R/B<br>
          
     </div>
     <div class='col-6'>
          <div class='row'>
               <div class='col-6'><table border="1px" style="border-collapse:collapse;width: 400px;margin-left: -150px;">
               <tr>
                    <th>Tone</th>
                    <th>Patella</th>
                    <th>Ankle</th>
               </tr>
               <tr>
                    <td>Right</td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>Left</td>
                    <td></td>
                    <td></td>
               </tr>
                    </table>
               </div>
               <div class='col-6'>
               <div style="border:1px solid black;">
               <p style="text-decoration: underline;">Discogenic Pain:</p>
               <label>L1-2</label>&nbsp;&nbsp;<label>L2-3</label>&nbsp;&nbsp;<label>L3-4</label>&nbsp;&nbsp;<label>L4-5</label>&nbsp;&nbsp;<label>L5-S1</label>
               <p style="text-decoration: underline;">Facet Pain:</p>
               <table>
                    <tr>
                         <td>R</td>
                         <td>L1-2</td>
                         <td>L2-3</td>
                         <td>L3-4</td>
                         <td>L4-5</td>
                         <td>L5-S1</td>
                    </tr>
                    <tr>
                         <td>L</td>
                         <td>L1-2</td>
                         <td>L2-3</td>
                         <td>L3-4</td>
                         <td>L4-5</td>
                         <td>L5-S1</td>
                    </tr>
               </table>


               </div>

          </div>
          <br>
          <br>
        
       <div style="border:1px solid black;padding:5px 10px;">
        <input type="checkbox">Hip pain:R L B
        <input type="checkbox">Knee pain:R L B
        <input type="checkbox">Shoulder:R L B
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
               <b> A/P 1. <input type="text" name="ap1" id="ap1" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;2. <input type="text" name="ap2" id="ap2" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;3. <input type="text" name="ap3" id="ap3" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;4. <input type="text" name="ap4" id="ap4" style="width:85%;"><br>
               &emsp;&emsp;&nbsp;&nbsp;s. <input type="text" name="aps" id="aps" style="width:85%;">

               </b>
          </div>
          <div class="col-6">
           <div class="" style="border:1px solid;font-weight:bold;padding-left:10px"> 
               <input type="checkbox" name="check1" id="check1">&ensp; Lumbago with sciatica, Right side (M54.41) <br>
               <input type="checkbox" name="check2" id="check2">&ensp; Lumbago with sciatica, Left side (M54.42)<br>
               <input type="checkbox" name="check3" id="check3">&ensp; Sciatica Right side (M54.31)<br>
               <input type="checkbox" name="check4" id="check4">&ensp; Sciatica Left side (M54.32)<br>
               <input type="checkbox" name="check5" id="check5">&ensp; Radiculopathy I Radiculitis Lumbar (M54.16)<br>
               <input type="checkbox" name="check6" id="check6">&ensp;  Facet Syndrome, Lumbar (M53.86)<br>
               <input type="checkbox" name="check7" id="check7">&ensp;  HNP/ bulge lumbar w/o myelopathy/radiculopathy (M51.26)<br>
               <input type="checkbox" name="check8" id="check8">&ensp;  HNP/disc bulge lumbar w/radiculopathy (M51.16)<br>
               <input type="checkbox" name="check9" id="check9">&ensp;  Sprain/Strain  Lumb subseq encounter (S33.5XXA)<br>
               <input type="checkbox" name="check10" id="check10">&ensp; Knee pain RT (M25.561) LT (M25.562)<br>
               <input type="checkbox" name="check11" id="check11">&ensp; Hip pain	RT (M25.551) ILT (M25.552)<br>
               <input type="checkbox" name="check12" id="check12">&ensp; Trochanteric bursitis   RT (M70.61)  I LT (M70.62)<br>
               <input type="checkbox" name="check13" id="check13">&ensp;  Annular tear Lumbar (M51.86)<br>
               <input type="checkbox" name="check14" id="check14">&ensp; Drop Foot, RT (M21.371) D Drop Foot, LT (M21.372)<br>
               <input type="checkbox" name="check15" id="check15">&ensp;  Hx of Lumbar Fusion (M43.26)<br>
               <input type="checkbox" name="check16" id="check16">&ensp;  M51.A2 lntervertebral annulus fibrosus, large, lumbar region<br>
               <input type="checkbox" name="check17" id="check17">&ensp; M51.A5 lntervertebral annulus fibrosus defect, large, lumbarsacral region
           </div>
          <br>
           <div style="border:1px solid;padding-left:10px;padding-bottom:5px;">
           <b >
           Dr. Deuk	&emsp;&emsp;&emsp; <input type="text" name="sign1" id="sign1" style="width:45%;"><br>
            Dr. DeMola &emsp;&emsp;&emsp;<input type="text" name="sign2" id="sign2" style="width:45%;"><br>
            <br><br>
            <label align='center' style="width:100%;"><input type="text" name="pat_label" id="pat_label" style="width:85%;"><br>Patient Label</label>
           </b>
           </div>
          </div>
        </div>
             
      <br><br>
        </div>
        <div class="btndiv">
          <input type="submit" name="sub" value="Submit" class="subbtn">
          <button class="cancel" type="button"  onclick="top.restoreSession(); parent.closeTab(window.name, false);"><?php echo xlt('Cancel');?></button>
        </div>
</form>

</div>
</div>
</div>
</body>
</html>