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
      $sql = "SELECT * FROM `form_deuk_spine_Thoracic` WHERE id=? AND pid = ? AND enc = ?";
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
          input[type="checkbox"  <?php echo ($check_res["n_Coordination"] == 1) ? "checked" : ""; ?>] {
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
        <h4 align="center" style="width:100%;"><u> Deuk Spine Institute Consultation </u>
        <h6 align="center">Thoracic</h6></h4>
          <br>
        <form method="post" name="my_form" action="<?php echo $rootdir; ?>/forms/form_deuk_spine_Thoracic/save.php?id=<?php echo attr_url($formid); ?>">
        
        <div class="row">
               <div class="col-4">
                    <label style="border: 1px solid;padding:2px"> pain: X Numbness :O Weekness : /pins & needles: * </label>      
               </div>
               <div class="col-3">DOS <input type="date" value="<?php echo attr($check_res["dos"]); ?>"  name="dos" id="dos"></div>
               <div class="col-5">
                    Room # :  &emsp;<input type="text"  value="<?php echo attr($check_res["room_no"]); ?>"  name="room_no" id="room_no"><br>
                    Insurance : &ensp;<input type="text"  value="<?php echo attr($check_res["ins_num"]); ?>"  name="ins_num" id="ins_num"><br>
                    MA  Initials : <input type="text"  value="<?php echo attr($check_res["ma_ins"]); ?>"  name="ma_ins" id="ma_ins">   
               </div>
        </div>
        <br>
        <div class="row">
          <div class="col-4" align="center">
               <img src="../../forms/form_deuk_spine_Thoracic/deuk.png" alt="form_deuk_spine" style="width:80%">
          </div>
          <div class="col-8">
               Last Visit: <input type="date" value="<?php echo attr($check_res["last_visit"]); ?>"  name="last_visit" id="last_visit" style="width:60%"><br>
               CC: <input type="text"  value="<?php echo attr($check_res["cc"]); ?>"  name="cc" id="cc" style="width:65%"><br>
               Hx: <input type="text"  value="<?php echo attr($check_res["hx"]); ?>"  name="hx" id="hx" style="width:65%"><br>
               Spine Surgery Hx: <input type="text"  value="<?php echo attr($check_res["shx"]); ?>"  name="shx" id="shx" style="width:60%"><br> <br>
               My Pain(1-10) is :  &emsp;
               Worst : <input type="text"  value="<?php echo attr($check_res["Worst"]); ?>"  name="Worst" id="Worst"  style="width:25px" maxlength=2> /10 &emsp; 
               Average : <input type="text"  value="<?php echo attr($check_res["Average"]); ?>"  name="Average" id="Average" style="width:25px" maxlength=2> /10 &emsp;
               Best : <input type="text"  value="<?php echo attr($check_res["Best"]); ?>"  name="Best" id="Best" style="width:25px" maxlength=2> /10 <br><br>
          <div class="row">
               <div class = "col-4">
                    <div style="padding : 7px;border:1px solid">
                         Mid-Back  : <input type="text"  value="<?php echo attr($check_res["mid_back"]); ?>"  name="mid_back" id="mid_back" style="width:25px" maxlength=3> % &emsp; <br>
                         Chest Wall  : <input type="text"  value="<?php echo attr($check_res["chest_wall"]); ?>"  name="chest_wall" id="chest_wall" style="width:25px" maxlength=3> % 
                         <br> <b>R &emsp;&emsp;&emsp; L &emsp;&emsp;&emsp; B </b>
                    </div>
               </div>
               <div class = "col-7">
                    <div style="padding : 7px;border:1px solid"> 
                         Vitals : BP :<input type="text"  value="<?php echo attr($check_res["bp1"]); ?>"  name="bp1" id="bp1" style="width:25px" maxlength=3> / <input type="text"  value="<?php echo attr($check_res["bp2"]); ?>"  name="bp2" id="bp2" style="width:25px" maxlength=3> &emsp;&emsp; HR : <input type="text"  value="<?php echo attr($check_res["hrs"]); ?>"  name="hrs" id="hrs"  style="width:25px"maxlength=3> &emsp;&emsp; O2 %: <input type="text"  value="<?php echo attr($check_res["o2"]); ?>"  name="o2" id="o2"  style="width:25px"maxlength=3>
                    </div>
               </div>
          </div> 
          </div></div>
          <div class="row" style="margin-top : 20px;">
               <div class="col-6">
                    <table class="table-bordered" style="width:100%">
                         <tr>
                              <td style="padding: 5px;"><u>MOTOR</u></td>
                              <td style="padding: 5px;">C5</td>
                              <td style="padding: 5px;">C6</td>
                              <td style="padding: 5px;">C7</td>
                              <td style="padding: 5px;">C8</td>
                              <td style="padding: 5px;">T1</td>
                              <td style="padding: 5px;">L2</td>
                              <td style="padding: 5px;">L3</td>
                              <td style="padding: 5px;">L4</td>
                              <td style="padding: 5px;">L5</td>
                              <td style="padding: 5px;">S1</td>
                         </tr>
                         <tr>
                              <td style="padding: 5px;">Right</td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right1"]); ?>"  name="right1" id="right1" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right2"]); ?>"  name="right2" id="right2" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right3"]); ?>"  name="right3" id="right3" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right4"]); ?>"  name="right4" id="right4" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right5"]); ?>"  name="right5" id="right5" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right6"]); ?>"  name="right6" id="right6" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right7"]); ?>"  name="right7" id="right7" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right8"]); ?>"  name="right8" id="right8" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right9"]); ?>"  name="right9" id="right9" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right10"]); ?>"  name="right10" id="right10" style="width:25px"></td>
                         </tr>
                         <tr>
                              <td style="padding: 5px;">Left</td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left1"]); ?>"  name="left1" id="left1" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left2"]); ?>"  name="left2" id="left2" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left3"]); ?>"  name="left3" id="left3" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left4"]); ?>"  name="left4" id="left4" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left5"]); ?>"  name="left5" id="left5" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left6"]); ?>"  name="left6" id="left6" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left7"]); ?>"  name="left7" id="left7" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left8"]); ?>"  name="left8" id="left8" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left9"]); ?>"  name="left9" id="left9" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left10"]); ?>"  name="left10" id="left10" style="width:25px"></td>
                         </tr>
                    </table>
                    <br>
                    <table class="table-bordered" style="width:100%">
                         <tr>
                              <td style="padding: 5px;"><u>SENSORY</u></td>
                              <td style="padding: 5px;">C5</td>
                              <td style="padding: 5px;">C6</td>
                              <td style="padding: 5px;">C7</td>
                              <td style="padding: 5px;">C8</td>
                              <td style="padding: 5px;">T1</td>
                              <td style="padding: 5px;">L2</td>
                              <td style="padding: 5px;">L3</td>
                              <td style="padding: 5px;">L4</td>
                              <td style="padding: 5px;">LS</td>
                              <td style="padding: 5px;">S1</td>
                         </tr>
                         <tr>
                              <td style="padding: 5px;">Right</td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s1"]); ?>"  name="right_s1" id="right_s1" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s2"]); ?>"  name="right_s2" id="right_s2" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s3"]); ?>"  name="right_s3" id="right_s3" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s4"]); ?>"  name="right_s4" id="right_s4" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s5"]); ?>"  name="right_s5" id="right_s5" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s6"]); ?>"  name="right_s6" id="right_s6" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s7"]); ?>"  name="right_s7" id="right_s7" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s8"]); ?>"  name="right_s8" id="right_s8" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s9"]); ?>"  name="right_s9" id="right_s9" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["right_s10"]); ?>"  name="right_s10" id="right_s10" style="width:25px"></td>
                         </tr>
                         <tr>
                              <td style="padding: 5px;">Left</td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s1"]); ?>"  name="left_s1" id="left_s1" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s2"]); ?>"  name="left_s2" id="left_s2" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s3"]); ?>"  name="left_s3" id="left_s3" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s4"]); ?>"  name="left_s4" id="left_s4" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s5"]); ?>"  name="left_s5" id="left_s5" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s6"]); ?>"  name="left_s6" id="left_s6" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s7"]); ?>"  name="left_s7" id="left_s7" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s8"]); ?>"  name="left_s8" id="left_s8" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s9"]); ?>"  name="left_s9" id="left_s9" style="width:25px"></td>
                              <td style="padding: 5px;"><input type="text"  value="<?php echo attr($check_res["left_s10"]); ?>"  name="left_s10" id="left_s10" style="width:25px"></td>
                         </tr>
                    </table>
               </div>
               <div class="col-6">

               <h4>Physical Exam :</h4>
                    Cervical ROM : 
                    <input type="checkbox"  <?php echo ($check_res["n_Coordination"] == 1) ? "checked" : ""; ?> name="n_Coordination" id="n_Coordination"> normal &ensp;  
                    <input type="checkbox"  <?php echo ($check_res["u_Coordination"] == 1) ? "checked" : ""; ?> name="u_Coordination" id="u_Coordination"> limited &ensp;  
                    <input type="checkbox"  <?php echo ($check_res["l_Coordination"] == 1) ? "checked" : ""; ?> name="l_Coordination" id="l_Coordination"> painful <br>
                    Facet Loading : <input type="checkbox"  <?php echo ($check_res["n_Facet"] == 1) ? "checked" : ""; ?> name="n_Facet" id="n_Facet"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Facet"] == 1) ? "checked" : ""; ?> name="p_Facet" id="p_Facet"> positive &ensp; R &ensp; L &ensp; B <br>
                    Shoulder : <input type="checkbox"  <?php echo ($check_res["n_shoulder"] == 1) ? "checked" : ""; ?> name="n_shoulder" id="n_shoulder"> normal &ensp;  <input type="checkbox"  <?php echo ($check_res["p_shoulder"] == 1) ? "checked" : ""; ?> name="p_shoulder" id="p_shoulder"> pain with rotation &ensp; R &ensp; L &ensp; B <br>
                    Spurlings : <input type="checkbox"  <?php echo ($check_res["n_Spurlings"] == 1) ? "checked" : ""; ?> name="n_Spurlings" id="n_Spurlings"> negative &ensp;  <input type="checkbox"  <?php echo ($check_res["p_Spurlings"] == 1) ? "checked" : ""; ?> name="p_Spurlings" id="p_Spurlings"> positive &ensp; R &ensp; L &ensp; B <br>
                    Tinnels : <input type="checkbox"  <?php echo ($check_res["n_Tinnels"] == 1) ? "checked" : ""; ?> name="n_Tinnels" id="n_Tinnels"> normal &ensp;  <input type="checkbox"  <?php echo ($check_res["p_Tinnels"] == 1) ? "checked" : ""; ?> name="p_Tinnels" id="p_Tinnels"> positive &ensp; <input type="checkbox"  <?php echo ($check_res["w_Tinnels"] == 1) ? "checked" : ""; ?> name="w_Tinnels" id="w_Tinnels"> Wrist &ensp; R &ensp; L &ensp;<input type="checkbox"  <?php echo ($check_res["e_Tinnels"] == 1) ? "checked" : ""; ?> name="e_Tinnels" id="e_Tinnels"> Elbow &ensp; R &ensp; L <br>
                     <br>
                    <div style="padding : 7px;border:1px solid ">
                    <h6 align = 'center'>Myelopathy</h6>
                         Clonus : <input type="checkbox"  <?php echo ($check_res["n_Clonus"] == 1) ? "checked" : ""; ?> name="n_Clonus" id="n_Clonus"> negative  &ensp;  <input type="checkbox"  <?php echo ($check_res["p_Clonus"] == 1) ? "checked" : ""; ?> name="p_Clonus" id="p_Clonus"> positive &ensp; R &ensp; L &ensp; B <br>
                         Hoffman : <input type="checkbox"  <?php echo ($check_res["n_Hoffman"] == 1) ? "checked" : ""; ?> name="n_Hoffman" id="n_Hoffman"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Hoffman"] == 1) ? "checked" : ""; ?> name="p_Hoffman" id="p_Hoffman"> positive &ensp; R &ensp; L &ensp; B <br>
                         Rhomberg : <input type="checkbox"  <?php echo ($check_res["n_Rhomberg"] == 1) ? "checked" : ""; ?> name="n_Rhomberg" id="n_Rhomberg"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Rhomberg"] == 1) ? "checked" : ""; ?> name="p_Rhomberg" id="p_Rhomberg"> positive &ensp; R &ensp; L &ensp; B <br>
                         Babinski : <input type="checkbox"  <?php echo ($check_res["n_Babinski"] == 1) ? "checked" : ""; ?> name="n_Babinski" id="n_Babinski"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Babinski"] == 1) ? "checked" : ""; ?> name="p_Babinski" id="p_Babinski"> positive &ensp; R &ensp; L &ensp; B <br>
                         Coordination : <input type="checkbox"  <?php echo ($check_res["nb_Coordination"] == 1) ? "checked" : ""; ?> name="nb_Coordination" id="nb_Coordination"> normal &ensp;  <input type="checkbox"  <?php echo ($check_res["u_Coordination"] == 1) ? "checked" : ""; ?> name="u_Coordination" id="u_Coordination"> impaired UE &ensp;  <input type="checkbox"  <?php echo ($check_res["l_Coordination"] == 1) ? "checked" : ""; ?> name="l_Coordination" id="l_Coordination"> impaired LE <br>
                    </div> 
               </div>
          </div>
          <br>
          <div class="row">
               <div class='col-6'>
                    <div class="row">
                         <div class='col-6'>
                              <table border="1px" style="border-collapse:collapse;">
                                   <tr>
                                        <th>Tone</th>
                                        <th>Patella</th>
                                        <th>Ankle</th>
                                        <th>Bicep</th>
                                        <th>Tricep</th>
                                   </tr>
                                   <tr>
                                        <td>Right</td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;"  value="<?php echo attr($check_res["Patella_right1"]); ?>" name="Patella_right1" id="Patella_right1"></td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;"  value="<?php echo attr($check_res["Patella_right2"]); ?>" name="Patella_right2" id="Patella_right2"></td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;"  value="<?php echo attr($check_res["Patella_right3"]); ?>" name="Patella_right3" id="Patella_right3"></td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;"  value="<?php echo attr($check_res["Patella_right4"]); ?>" name="Patella_right4" id="Patella_right4"></td>
                                   </tr>
                                   <tr>
                                        <td>Left</td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;" value="<?php echo attr($check_res["Ankle_left1"]); ?>" name="Ankle_left1" id="Ankle_left1"></td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;" value="<?php echo attr($check_res["Ankle_left2"]); ?>" name="Ankle_left2" id="Ankle_left2"></td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;" value="<?php echo attr($check_res["Ankle_left3"]); ?>" name="Ankle_left3" id="Ankle_left3"></td>
                                        <td style="padding: 5px;"><input type="text" style="width:45px;" value="<?php echo attr($check_res["Ankle_left4"]); ?>" name="Ankle_left4" id="Ankle_left4"></td>
                                   </tr>
                              </table><br>
                              <div style="font-size: 12px;border:1px solid black;padding: 7px;">
                                   <p style="text-decoration: underline;">Discogenic Pain:</p>	
                                        <label>C3-4</label>&nbsp;&nbsp;
                                        <label>C4-5</label>&nbsp;&nbsp;
                                        <label>C5-6</label>&nbsp;&nbsp;
                                        <label>C6-7</label>&nbsp;&nbsp;
                                        <label>C7-T1</label>
                                   <p style="text-decoration: underline;">Radiculopathy:</p>
                                   
                                             <label>R &ensp;</label>
                                             <label>C3-4 &ensp;</label>
                                             <label>C4-5 &ensp;</label>
                                             <label>C5-6 &ensp;</label>
                                             <label>C6-7 &ensp;</label>
                                             <label>C7-T1</label>
                                        <br>
                                             <label>L &ensp;</label>
                                             <label>C3-4 &ensp;</label>
                                             <label>C4-5 &ensp;</label>
                                             <label>C5-6 &ensp;</label>
                                             <label>C6-7 &ensp;</label>
                                             <label>C7-T1</label>
                                        
                                   <p style="text-decoration: underline;">Facet Pain:</p>
                                   
                                             <label>R &ensp;</label>
                                             <label>C1-2 &ensp;</label>
                                             <label>C2-3 &ensp;</label>
                                             <label>C3-4</label>&nbsp;&nbsp;
                                             <label>C4-5</label>&nbsp;&nbsp;
                                             <label>C5-6</label>&nbsp;&nbsp;
                                             <label>C6-7</label>&nbsp;&nbsp;
                                             <label>C7-T1</label>
                                        <br>
                                             <label>L &ensp;</label>
                                             <label>C1-2 &ensp;</label>
                                             <label>C2-3 &ensp;</label>
                                             <label>C3-4 &ensp;</label>
                                             <label>C4-5 &nbsp;&nbsp;</label>
                                             <label>C5-6 &nbsp;&nbsp;</label>
                                             <label>C6-7 &nbsp;&nbsp;</label>
                                             <label>C7-T1</label>
                              </div>
                         </div>
                         <div class='col-6'>
                              <div style="font-size:12px;border:1px solid black;padding: 7px;">
                                   C-MBB/RFA w/ Dr.Patel or Dr Francischini :
                                   <br><br>
                                   R &emsp;&emsp;  L&emsp;&emsp; B &emsp;&emsp;  Level(s): &emsp;  T1-2,&emsp; T2-3,&emsp;
                                   T3-4,&emsp; T4-5,&emsp; T5-6,&emsp; T6-7,&emsp; T7-8,&emsp; T8-9,&emsp;
                                   T9-10,&emsp; T10-11,&emsp; T11-12,&emsp; T12-L1
                              </div><br>
                              <div  style="border:1px solid black;padding:5px 10px;">
                                   <input type="checkbox"  <?php echo ($check_res["hip_check"] == 1) ? "checked" : ""; ?> id="hip_check" name= "hip_check" > Hip pain: R &ensp; L &ensp;B <br>
                                   <input type="checkbox"  <?php echo ($check_res["knee_check"] == 1) ? "checked" : ""; ?> id="knee_check" name= "knee_check"> Knee pain: R &ensp; L &ensp; B <br>
                                   <input type="checkbox"  <?php echo ($check_res["shoulder_check"] == 1) ? "checked" : ""; ?> id="shoulder_check" name= "shoulder_check"> Shoulder: R &ensp; L &ensp; B
                              </div>
                         </div>
                    </div><br>
                    <div style="font-size: 12px;border:1px solid black;padding: 7px;">
                         * Surgery Recommendation : <br>
                         * DLDR : <br>
                         R &emsp; T1-2 &emsp; T2-3 &emsp; T3-4 &emsp; T4-5 &emsp; T5-6 &emsp; T6-7  &emsp; T7-8 &emsp; T8-9 &emsp; T9-10 &emsp; T10-11 &emsp; T11-12 &emsp; T12-L1<br>
                         L &emsp; T1-2 &emsp; T2-3 &emsp; T3-4 &emsp; T4-5 &emsp; T5-6 &emsp; T6-7  &emsp; T7-8 &emsp; T8-9 &emsp; T9-10 &emsp; T10-11 &emsp; T11-12 &emsp; T12-L1<br>

                         * DPR : <br>
                         R &emsp; T1-2 &emsp; T2-3 &emsp; T3-4 &emsp; T4-5 &emsp; T5-6 &emsp; T6-7  &emsp; T7-8 &emsp; T8-9 &emsp; T9-10 &emsp; T10-11 &emsp; T11-12 &emsp; T12-L1<br>
                         L &emsp; T1-2 &emsp; T2-3 &emsp; T3-4 &emsp; T4-5 &emsp; T5-6 &emsp; T6-7  &emsp; T7-8 &emsp; T8-9 &emsp; T9-10 &emsp; T10-11 &emsp; T11-12 &emsp; T12-L1<br>
                    </div>
               </div> <!-- //row close -->
               <div class='col-6'>
                    <div class="" style="border:1px solid;font-weight:bold;padding-left:10px"> 
                    <u><b>Cervical / Cervicothoracic Diaqnosis:</b></u><br>
                         <input type="checkbox"  <?php echo ($check_res["check1"] == 1) ? "checked" : ""; ?> name="check1" id="check1">&ensp; Thoracalgia (M54.6) <br>
                         <input type="checkbox"  <?php echo ($check_res["check2"] == 1) ? "checked" : ""; ?> name="check2" id="check2">&ensp; Spondylosis w/Myelopathy (M47.14) <br>
                         <input type="checkbox"  <?php echo ($check_res["check3"] == 1) ? "checked" : ""; ?> name="check3" id="check3">&ensp; Cervicobrachial Syndrome (M53.1)<br>
                         <input type="checkbox"  <?php echo ($check_res["check4"] == 1) ? "checked" : ""; ?> name="check4" id="check4">&ensp; HHNP / disc bulge (myelopathy) (M51.04)<br>
                         <input type="checkbox"  <?php echo ($check_res["check5"] == 1) ? "checked" : ""; ?> name="check5" id="check5">&ensp; HNP w/Radiculopathy or Radiculitis (M54.14)<br>
                         <input type="checkbox"  <?php echo ($check_res["check6"] == 1) ? "checked" : ""; ?> name="check6" id="check6">&ensp;  Spondylosis (myelopathy) (M47.14)<br>
                         <input type="checkbox"  <?php echo ($check_res["check7"] == 1) ? "checked" : ""; ?> name="check7" id="check7">&ensp;  HNP / disc bulge (M51.24)<br>
                         <input type="checkbox"  <?php echo ($check_res["check8"] == 1) ? "checked" : ""; ?> name="check8" id="check8">&ensp; Stenosis (M48.04) <br>
                         <input type="checkbox"  <?php echo ($check_res["check9"] == 1) ? "checked" : ""; ?> name="check9" id="check9">&ensp; HNP/disc bulge w/Radiculopathy C7-T1 (M50.13) <br>
                         <input type="checkbox"  <?php echo ($check_res["check10"] == 1) ? "checked" : ""; ?> name="check10" id="check10">&ensp; Kyphosis, Postural Cervicothoracic region (M40.03)<br>
                         <input type="checkbox"  <?php echo ($check_res["check11"] == 1) ? "checked" : ""; ?> name="check11" id="check11">&ensp; Stenosis - Cerv-Thor C7-T1 (M48.03)<br>
                         <input type="checkbox"  <?php echo ($check_res["check12"] == 1) ? "checked" : ""; ?> name="check12" id="check12">&ensp;Carpal Tunnel Syndrome RT (G56.01) LT (G56.02) <br>
                         <input type="checkbox"  <?php echo ($check_res["check13"] == 1) ? "checked" : ""; ?> name="check13" id="check13">&ensp;Ulnar neuropathy RT (G56.21)LT (G56.22) <br>
                         <input type="checkbox"  <?php echo ($check_res["check14"] == 1) ? "checked" : ""; ?> name="check14" id="check14">&ensp; Weakness on Exam (M62.81) RLE / LLE / RUE I LUE <br>
                         <input type="checkbox"  <?php echo ($check_res["check15"] == 1) ? "checked" : ""; ?> name="check15" id="check15">&ensp;  Sensory deficit (R29.818) <br>
                         <input type="checkbox"  <?php echo ($check_res["check16"] == 1) ? "checked" : ""; ?> name="check16" id="check16">&ensp;  Facet Syndrome, Thoracic (M47.814) Thoracolumbar (M47.815) 
                    </div>
               </div>
          </div>
          <br>
                    <b> A/P 1. <input type="text"  value="<?php echo attr($check_res["ap1"]); ?>"  name="ap1" id="ap1" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;2. <input type="text"  value="<?php echo attr($check_res["ap2"]); ?>"  name="ap2" id="ap2" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;3. <input type="text"  value="<?php echo attr($check_res["ap3"]); ?>"  name="ap3" id="ap3" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;4. <input type="text"  value="<?php echo attr($check_res["ap4"]); ?>"  name="ap4" id="ap4" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;5. <input type="text"  value="<?php echo attr($check_res["ap5"]); ?>"  name="ap5" id="ap5" style="width:85%;">
                    </b>
                    <br><br>
          <div align="center" class = 'row'>
                    <div  class = 'col-6' >
                    <div  style="border:1px solid;padding-left:10px;padding-bottom:5px;">
                         <b >
                         Dr. Deuk	&emsp;&emsp;&emsp; <input type="text"  value="<?php echo attr($check_res["sign1"]); ?>"  name="sign1" id="sign1" style="width:45%;"><br>
                         Dr. DeMola &emsp;&emsp;&emsp;<input type="text"  value="<?php echo attr($check_res["sign2"]); ?>"  name="sign2" id="sign2" style="width:45%;"><br>
                         </b>
                    </div>
                    </div>
                    <div class = 'col-6' > 
                    <div  style="border:1px solid;padding-left:10px;padding-bottom:5px;">
                    <label align='center' style="width:100%;"><input type="text"  value="<?php echo attr($check_res["pat_label"]); ?>"  name="pat_label" id="pat_label" style="width:85%;"><br>Patient Label</label></div>
     </div>
          </div>
          <br><br>
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