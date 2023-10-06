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
               <div class="col-5" style="font-size:13px">
                    <input type="hidden" name="pos" id="pos" value="<?php echo attr($check_res["pos"]); ?>" >
                    <label style="border: 1px solid;padding:2px"> Pain: 
                    <input type="radio" name="pain" class="pain" id="pain1" value = "X"> &nbsp; X Numbness &emsp;
                    <input type="radio" name="pain" class="pain" id="pain2" value = "O"> &nbsp; O Weekness&emsp;
                    <input type="radio" name="pain" class="pain" id="pain3" value = "*"> &nbsp; * pins & needles
                    </label>   
               </div>
               <div class="col-3">DOS <input type="date" value="<?php echo attr($check_res["dos"]); ?>"  name="dos" id="dos"></div>
               <div class="col-4">
                    Room # :  &emsp;<input type="text"  value="<?php echo attr($check_res["room_no"]); ?>"  name="room_no" id="room_no"><br>
                    Insurance : &ensp;<input type="text"  value="<?php echo attr($check_res["ins_num"]); ?>"  name="ins_num" id="ins_num"><br>
                    MA  Initials : <input type="text"  value="<?php echo attr($check_res["ma_ins"]); ?>"  name="ma_ins" id="ma_ins">   
               </div>
        </div>
        <br>
        <div class="row">
          <div class="col-4" align="center">
               <img src="../../forms/form_deuk_spine_Thoracic/deuk.png" alt="form_deuk_spine" style="width:80%;cursor:pointer">
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
                    Facet Loading : <input type="checkbox"  <?php echo ($check_res["n_Facet"] == 1) ? "checked" : ""; ?> name="n_Facet" id="n_Facet"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Facet"] == 1) ? "checked" : ""; ?> name="p_Facet" id="p_Facet"> positive &ensp; 
                         <select name="check2" id="check2" value = '<?php echo attr($check_res["check2"])? $check_res["check2"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check2"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check2"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check2"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br>
                    Shoulder : <input type="checkbox"  <?php echo ($check_res["n_shoulder"] == 1) ? "checked" : ""; ?> name="n_shoulder" id="n_shoulder"> normal &ensp;  <input type="checkbox"  <?php echo ($check_res["p_shoulder"] == 1) ? "checked" : ""; ?> name="p_shoulder" id="p_shoulder"> pain with rotation &ensp; 
                         <select name="check3" id="check3" value = '<?php echo attr($check_res["check3"])? $check_res["check3"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check3"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check3"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check3"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br>
                    Spurlings : <input type="checkbox"  <?php echo ($check_res["n_Spurlings"] == 1) ? "checked" : ""; ?> name="n_Spurlings" id="n_Spurlings"> negative &ensp;  <input type="checkbox"  <?php echo ($check_res["p_Spurlings"] == 1) ? "checked" : ""; ?> name="p_Spurlings" id="p_Spurlings"> positive &ensp; 
                         <select name="check4" id="check4" value = '<?php echo attr($check_res["check4"])? $check_res["check4"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check4"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check4"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check4"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br>
                    Tinnels : <input type="checkbox"  <?php echo ($check_res["n_Tinnels"] == 1) ? "checked" : ""; ?> name="n_Tinnels" id="n_Tinnels"> normal &ensp;  <input type="checkbox"  <?php echo ($check_res["p_Tinnels"] == 1) ? "checked" : ""; ?> name="p_Tinnels" id="p_Tinnels"> positive &ensp; <input type="checkbox"  <?php echo ($check_res["w_Tinnels"] == 1) ? "checked" : ""; ?> name="w_Tinnels" id="w_Tinnels"> Wrist &ensp; 
                         <select name="check5" id="check5" value = '<?php echo attr($check_res["check5"])? $check_res["check5"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check5"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check5"] == 'L') ? "selected" : ""; ?> >L</option>
                         </select> &ensp;

                    <input type="checkbox"  <?php echo ($check_res["e_Tinnels"] == 1) ? "checked" : ""; ?> name="e_Tinnels" id="e_Tinnels"> Elbow &ensp; 
                    
                    <select name="check6" id="check6" value = '<?php echo attr($check_res["check6"])? $check_res["check6"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check6"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check6"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check6"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select><br>
                     <br>
                    <div style="padding : 7px;border:1px solid ">
                    <h6 align = 'center'>Myelopathy</h6>
                         Clonus : <input type="checkbox"  <?php echo ($check_res["n_Clonus"] == 1) ? "checked" : ""; ?> name="n_Clonus" id="n_Clonus"> negative  &ensp;  <input type="checkbox"  <?php echo ($check_res["p_Clonus"] == 1) ? "checked" : ""; ?> name="p_Clonus" id="p_Clonus"> positive &ensp; 
                         <select name="check7" id="check7" value = '<?php echo attr($check_res["check7"])? $check_res["check7"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check7"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check7"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check7"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br>
                         Hoffman : <input type="checkbox"  <?php echo ($check_res["n_Hoffman"] == 1) ? "checked" : ""; ?> name="n_Hoffman" id="n_Hoffman"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Hoffman"] == 1) ? "checked" : ""; ?> name="p_Hoffman" id="p_Hoffman"> positive &ensp; 
                         <select name="check8" id="check8" value = '<?php echo attr($check_res["check8"])? $check_res["check8"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check8"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check8"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check8"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br>
                         Rhomberg : <input type="checkbox"  <?php echo ($check_res["n_Rhomberg"] == 1) ? "checked" : ""; ?> name="n_Rhomberg" id="n_Rhomberg"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Rhomberg"] == 1) ? "checked" : ""; ?> name="p_Rhomberg" id="p_Rhomberg"> positive &ensp; 
                         <select name="check9" id="check9" value = '<?php echo attr($check_res["check9"])? $check_res["check9"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check9"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check9"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check9"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br>
                         Babinski : <input type="checkbox"  <?php echo ($check_res["n_Babinski"] == 1) ? "checked" : ""; ?> name="n_Babinski" id="n_Babinski"> negative&ensp;  <input type="checkbox"  <?php echo ($check_res["p_Babinski"] == 1) ? "checked" : ""; ?> name="p_Babinski" id="p_Babinski"> positive &ensp; 
                         <select name="check10" id="check10" value = '<?php echo attr($check_res["check10"])? $check_res["check10"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check10"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check10"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check10"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br>
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
                                        
                                   <select name="check11" id="check11" value = '<?php echo attr($check_res["check11"])? $check_res["check11"] : ""; ?>' >
                                        <option value = 'C3-4' <?php echo attr($check_res["check11"] == 'C3-4') ? "selected" : ""; ?> >C3-4</option>
                                        <option value = 'C4-5' <?php echo attr($check_res["check11"] == 'C4-5') ? "selected" : ""; ?> >C4-5</option>
                                        <option value = 'C5-6' <?php echo attr($check_res["check11"] == 'C5-6') ? "selected" : ""; ?> >C5-6</option>
                                        <option value = 'C6-7' <?php echo attr($check_res["check11"] == 'C6-7') ? "selected" : ""; ?> >C6-7</option>
                                        <option value = 'C7-T1' <?php echo attr($check_res["check11"] == 'C7-T1') ? "selected" : ""; ?> >C7-T1</option>
                                   </select>
                                   <p style="text-decoration: underline;">Radiculopathy:</p>
                                           
                                             <label>R &ensp;</label>
                                        <select name="check12" id="check12" value = '<?php echo attr($check_res["check12"])? $check_res["check12"] : ""; ?>' >
                                             <option value = 'C3-4' <?php echo attr($check_res["check12"] == 'C3-4') ? "selected" : ""; ?> >C3-4</option>
                                             <option value = 'C4-5' <?php echo attr($check_res["check12"] == 'C4-5') ? "selected" : ""; ?> >C4-5</option>
                                             <option value = 'C5-6' <?php echo attr($check_res["check12"] == 'C5-6') ? "selected" : ""; ?> >C5-6</option>
                                             <option value = 'C6-7' <?php echo attr($check_res["check12"] == 'C6-7') ? "selected" : ""; ?> >C6-7</option>
                                             <option value = 'C7-T1' <?php echo attr($check_res["check12"] == 'C7-T1') ? "selected" : ""; ?> >C7-T1</option>
                                        </select> &emsp;
                                             <label>L &ensp;</label>
                                             <select name="check13" id="check13" value = '<?php echo attr($check_res["check13"])? $check_res["check13"] : ""; ?>' >
                                                  <option value = 'C3-4' <?php echo attr($check_res["check13"] == 'C3-4') ? "selected" : ""; ?> >C3-4</option>
                                                  <option value = 'C4-5' <?php echo attr($check_res["check13"] == 'C4-5') ? "selected" : ""; ?> >C4-5</option>
                                                  <option value = 'C5-6' <?php echo attr($check_res["check13"] == 'C5-6') ? "selected" : ""; ?> >C5-6</option>
                                                  <option value = 'C6-7' <?php echo attr($check_res["check13"] == 'C6-7') ? "selected" : ""; ?> >C6-7</option>
                                                  <option value = 'C7-T1' <?php echo attr($check_res["check13"] == 'C7-T1') ? "selected" : ""; ?> >C7-T1</option>
                                             </select>
                                        
                                   <p style="text-decoration: underline;">Facet Pain:</p>
                                   
                                             <label>R &ensp;
                                        <select name="check14" id="check14" value = '<?php echo attr($check_res["check14"])? $check_res["check14"] : ""; ?>' >
                                                  <option value="C1-2" <?php echo attr($check_res["check14"] == 'C1-2') ? "selected" : ""; ?> >C1-2 </option>
                                                  <option value="C2-3" <?php echo attr($check_res["check14"] == 'C2-3') ? "selected" : ""; ?> >C2-3 </option>
                                                  <option value="C3-4" <?php echo attr($check_res["check14"] == 'C3-4') ? "selected" : ""; ?> >C3-4 </option>
                                                  <option value="C4-5" <?php echo attr($check_res["check14"] == 'C4-5') ? "selected" : ""; ?> >C4-5 </option>
                                                  <option value="C5-6" <?php echo attr($check_res["check14"] == 'C5-6') ? "selected" : ""; ?> >C5-6 </option>
                                                  <option value="C6-7" <?php echo attr($check_res["check14"] == 'C6-7') ? "selected" : ""; ?> >C6-7 </option>
                                                  <option value="C7-T1" <?php echo attr($check_res["check14"] == 'C7-T1') ? "selected" : ""; ?> >C7-T1</option>
                                        </select>&emsp;&emsp;
                                             <label>L &ensp;</label>
                                        <select name="check15" id="check15" value = '<?php echo attr($check_res["check15"])? $check_res["check15"] : ""; ?>' >
                                                  <option value="C1-2" <?php echo attr($check_res["check15"] == 'C1-2') ? "selected" : ""; ?> >C1-2 </option>
                                                  <option value="C2-3" <?php echo attr($check_res["check15"] == 'C2-3') ? "selected" : ""; ?> >C2-3 </option>
                                                  <option value="C3-4" <?php echo attr($check_res["check15"] == 'C3-4') ? "selected" : ""; ?> >C3-4 </option>
                                                  <option value="C4-5" <?php echo attr($check_res["check15"] == 'C4-5') ? "selected" : ""; ?> >C4-5 </option>
                                                  <option value="C5-6" <?php echo attr($check_res["check15"] == 'C5-6') ? "selected" : ""; ?> >C5-6 </option>
                                                  <option value="C6-7" <?php echo attr($check_res["check15"] == 'C6-7') ? "selected" : ""; ?> >C6-7 </option>
                                                  <option value="C7-T1" <?php echo attr($check_res["check15"] == 'C7-T1') ? "selected" : ""; ?> >C7-T1</option>
                                        </select>&emsp;&emsp;
                              </div>
                         </div>
                         <div class='col-6'>
                              <div style="font-size:12px;border:1px solid black;padding: 7px;">
                                   C-MBB/RFA w/ Dr.Patel or Dr Francischini :
                                   <br><br>
                                   R &ensp;
                                   <select name="check16" id="check16" value = '<?php echo attr($check_res["check16"])? $check_res["check16"] : ""; ?>' >
                                        <option value="T1-2" <?php echo attr($check_res["check16"] == 'T1-2') ? "selected" : ""; ?> >T1-2</option>
                                        <option value="T2-3" <?php echo attr($check_res["check16"] == 'T2-3') ? "selected" : ""; ?> >T2-3</option>
                                        <option value="T3-4" <?php echo attr($check_res["check16"] == 'T3-4') ? "selected" : ""; ?> >T3-4</option>
                                        <option value="T4-5" <?php echo attr($check_res["check16"] == 'T4-5') ? "selected" : ""; ?> >T4-5</option>
                                        <option value="T5-6" <?php echo attr($check_res["check16"] == 'T5-6') ? "selected" : ""; ?> >T5-6</option>
                                        <option value="T6-7" <?php echo attr($check_res["check16"] == 'T6-7') ? "selected" : ""; ?> >T6-7</option>
                                        <option value="T7-8" <?php echo attr($check_res["check16"] == 'T7-8') ? "selected" : ""; ?> >T7-8</option>
                                        <option value="T8-9" <?php echo attr($check_res["check16"] == 'T8-9') ? "selected" : ""; ?> >T8-9</option>
                                        <option value="T9-10" <?php echo attr($check_res["check16"] == 'T9-10') ? "selected" : ""; ?> >T9-10</option>
                                        <option value="T10-11" <?php echo attr($check_res["check16"] == 'T10-11') ? "selected" : ""; ?> >T10-11</option>
                                        <option value="T11-12" <?php echo attr($check_res["check16"] == 'T11-12') ? "selected" : ""; ?> >T11-12</option>
                                        <option value="T12-L1" <?php echo attr($check_res["check16"] == 'T12-L1') ? "selected" : ""; ?> >T12-L1</option>
                                   </select>
                                   &ensp;&ensp;&ensp;
                                   L&ensp;
                                   <select name="check17" id="check17" value = '<?php echo attr($check_res["check17"])? $check_res["check17"] : ""; ?>' >
                                        <option value="T1-2" <?php echo attr($check_res["check17"] == 'T1-2') ? "selected" : ""; ?> >T1-2</option>
                                        <option value="T2-3" <?php echo attr($check_res["check17"] == 'T2-3') ? "selected" : ""; ?> >T2-3</option>
                                        <option value="T3-4" <?php echo attr($check_res["check17"] == 'T3-4') ? "selected" : ""; ?> >T3-4</option>
                                        <option value="T4-5" <?php echo attr($check_res["check17"] == 'T4-5') ? "selected" : ""; ?> >T4-5</option>
                                        <option value="T5-6" <?php echo attr($check_res["check17"] == 'T5-6') ? "selected" : ""; ?> >T5-6</option>
                                        <option value="T6-7" <?php echo attr($check_res["check17"] == 'T6-7') ? "selected" : ""; ?> >T6-7</option>
                                        <option value="T7-8" <?php echo attr($check_res["check17"] == 'T7-8') ? "selected" : ""; ?> >T7-8</option>
                                        <option value="T8-9" <?php echo attr($check_res["check17"] == 'T8-9') ? "selected" : ""; ?> >T8-9</option>
                                        <option value="T9-10" <?php echo attr($check_res["check17"] == 'T9-10') ? "selected" : ""; ?> >T9-10</option>
                                        <option value="T10-11" <?php echo attr($check_res["check17"] == 'T10-11') ? "selected" : ""; ?> >T10-11</option>
                                        <option value="T11-12" <?php echo attr($check_res["check17"] == 'T11-12') ? "selected" : ""; ?> >T11-12</option>
                                        <option value="T12-L1" <?php echo attr($check_res["check17"] == 'T12-L1') ? "selected" : ""; ?> >T12-L1</option>
                                   </select>
                                   <br>
                                   B &ensp;
                                   <select name="check18" id="check18" value = '<?php echo attr($check_res["check18"])? $check_res["check18"] : ""; ?>' style="margin-top:10px" >
                                        <option value="T1-2" <?php echo attr($check_res["check18"] == 'T1-2') ? "selected" : ""; ?> >T1-2</option>
                                        <option value="T2-3" <?php echo attr($check_res["check18"] == 'T2-3') ? "selected" : ""; ?> >T2-3</option>
                                        <option value="T3-4" <?php echo attr($check_res["check18"] == 'T3-4') ? "selected" : ""; ?> >T3-4</option>
                                        <option value="T4-5" <?php echo attr($check_res["check18"] == 'T4-5') ? "selected" : ""; ?> >T4-5</option>
                                        <option value="T5-6" <?php echo attr($check_res["check18"] == 'T5-6') ? "selected" : ""; ?> >T5-6</option>
                                        <option value="T6-7" <?php echo attr($check_res["check18"] == 'T6-7') ? "selected" : ""; ?> >T6-7</option>
                                        <option value="T7-8" <?php echo attr($check_res["check18"] == 'T7-8') ? "selected" : ""; ?> >T7-8</option>
                                        <option value="T8-9" <?php echo attr($check_res["check18"] == 'T8-9') ? "selected" : ""; ?> >T8-9</option>
                                        <option value="T9-10" <?php echo attr($check_res["check18"] == 'T9-10') ? "selected" : ""; ?> >T9-10</option>
                                        <option value="T10-11" <?php echo attr($check_res["check18"] == 'T10-11') ? "selected" : ""; ?> >T10-11</option>
                                        <option value="T11-12" <?php echo attr($check_res["check18"] == 'T11-12') ? "selected" : ""; ?> >T11-12</option>
                                        <option value="T12-L1" <?php echo attr($check_res["check18"] == 'T12-L1') ? "selected" : ""; ?> >T12-L1</option>
                                   </select>
                              </div><br>
                              <div  style="border:1px solid black;padding:5px 10px;">
                                   <input type="checkbox"  <?php echo ($check_res["hip_check"] == 1) ? "checked" : ""; ?> id="hip_check" name= "hip_check" > Hip pain: 
                                   
                         <select name="check19" id="check19" value = '<?php echo attr($check_res["check19"])? $check_res["check19"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check19"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check19"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check19"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br><br>
                                   <input type="checkbox"  <?php echo ($check_res["knee_check"] == 1) ? "checked" : ""; ?> id="knee_check" name= "knee_check"> Knee pain: 
                         <select name="check20" id="check20" value = '<?php echo attr($check_res["check20"])? $check_res["check20"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check20"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check20"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check20"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select> <br><br>
                                   <input type="checkbox"  <?php echo ($check_res["shoulder_check"] == 1) ? "checked" : ""; ?> id="shoulder_check" name= "shoulder_check"> Shoulder: 
                         <select name="check21" id="check21" value = '<?php echo attr($check_res["check21"])? $check_res["check21"] : ""; ?>' >
                              <option value="R" <?php echo attr($check_res["check21"] == 'R') ? "selected" : ""; ?> >R</option>
                              <option value="L" <?php echo attr($check_res["check21"] == 'L') ? "selected" : ""; ?> >L</option>
                              <option value="B" <?php echo attr($check_res["check21"] == 'B') ? "selected" : ""; ?> >B</option>
                         </select>
                              </div>
                         </div>
                    </div><br>
                    <div style="font-size: 12px;border:1px solid black;padding: 7px;">
                         * Surgery Recommendation : <br>
                         * DLDR : <br>
                         R &emsp; 
                         <select name="check22" id="check22" value = '<?php echo attr($check_res["check22"])? $check_res["check22"] : ""; ?>' style="margin-top:10px" >
                                        <option value="T1-2" <?php echo attr($check_res["check22"] == 'T1-2') ? "selected" : ""; ?> >T1-2</option>
                                        <option value="T2-3" <?php echo attr($check_res["check22"] == 'T2-3') ? "selected" : ""; ?> >T2-3</option>
                                        <option value="T3-4" <?php echo attr($check_res["check22"] == 'T3-4') ? "selected" : ""; ?> >T3-4</option>
                                        <option value="T4-5" <?php echo attr($check_res["check22"] == 'T4-5') ? "selected" : ""; ?> >T4-5</option>
                                        <option value="T5-6" <?php echo attr($check_res["check22"] == 'T5-6') ? "selected" : ""; ?> >T5-6</option>
                                        <option value="T6-7" <?php echo attr($check_res["check22"] == 'T6-7') ? "selected" : ""; ?> >T6-7</option>
                                        <option value="T7-8" <?php echo attr($check_res["check22"] == 'T7-8') ? "selected" : ""; ?> >T7-8</option>
                                        <option value="T8-9" <?php echo attr($check_res["check22"] == 'T8-9') ? "selected" : ""; ?> >T8-9</option>
                                        <option value="T9-10" <?php echo attr($check_res["check22"] == 'T9-10') ? "selected" : ""; ?> >T9-10</option>
                                        <option value="T10-11" <?php echo attr($check_res["check22"] == 'T10-11') ? "selected" : ""; ?> >T10-11</option>
                                        <option value="T11-12" <?php echo attr($check_res["check22"] == 'T11-12') ? "selected" : ""; ?> >T11-12</option>
                                        <option value="T12-L1" <?php echo attr($check_res["check22"] == 'T12-L1') ? "selected" : ""; ?> >T12-L1</option>
                                   </select> &emsp; &emsp;
                         L &emsp;
                         <select name="check23" id="check23" value = '<?php echo attr($check_res["check23"])? $check_res["check23"] : ""; ?>' style="margin-top:10px" >
                                        <option value="T1-2" <?php echo attr($check_res["check23"] == 'T1-2') ? "selected" : ""; ?> >T1-2</option>
                                        <option value="T2-3" <?php echo attr($check_res["check23"] == 'T2-3') ? "selected" : ""; ?> >T2-3</option>
                                        <option value="T3-4" <?php echo attr($check_res["check23"] == 'T3-4') ? "selected" : ""; ?> >T3-4</option>
                                        <option value="T4-5" <?php echo attr($check_res["check23"] == 'T4-5') ? "selected" : ""; ?> >T4-5</option>
                                        <option value="T5-6" <?php echo attr($check_res["check23"] == 'T5-6') ? "selected" : ""; ?> >T5-6</option>
                                        <option value="T6-7" <?php echo attr($check_res["check23"] == 'T6-7') ? "selected" : ""; ?> >T6-7</option>
                                        <option value="T7-8" <?php echo attr($check_res["check23"] == 'T7-8') ? "selected" : ""; ?> >T7-8</option>
                                        <option value="T8-9" <?php echo attr($check_res["check23"] == 'T8-9') ? "selected" : ""; ?> >T8-9</option>
                                        <option value="T9-10" <?php echo attr($check_res["check23"] == 'T9-10') ? "selected" : ""; ?> >T9-10</option>
                                        <option value="T10-11" <?php echo attr($check_res["check23"] == 'T10-11') ? "selected" : ""; ?> >T10-11</option>
                                        <option value="T11-12" <?php echo attr($check_res["check23"] == 'T11-12') ? "selected" : ""; ?> >T11-12</option>
                                        <option value="T12-L1" <?php echo attr($check_res["check23"] == 'T12-L1') ? "selected" : ""; ?> >T12-L1</option>
                                   </select><br>

                         * DPR : <br>
                         R &emsp;
                         <select name="check24" id="check24" value = '<?php echo attr($check_res["check24"])? $check_res["check24"] : ""; ?>' style="margin-top:10px" >
                                        <option value="T1-2" <?php echo attr($check_res["check24"] == 'T1-2') ? "selected" : ""; ?> >T1-2</option>
                                        <option value="T2-3" <?php echo attr($check_res["check24"] == 'T2-3') ? "selected" : ""; ?> >T2-3</option>
                                        <option value="T3-4" <?php echo attr($check_res["check24"] == 'T3-4') ? "selected" : ""; ?> >T3-4</option>
                                        <option value="T4-5" <?php echo attr($check_res["check24"] == 'T4-5') ? "selected" : ""; ?> >T4-5</option>
                                        <option value="T5-6" <?php echo attr($check_res["check24"] == 'T5-6') ? "selected" : ""; ?> >T5-6</option>
                                        <option value="T6-7" <?php echo attr($check_res["check24"] == 'T6-7') ? "selected" : ""; ?> >T6-7</option>
                                        <option value="T7-8" <?php echo attr($check_res["check24"] == 'T7-8') ? "selected" : ""; ?> >T7-8</option>
                                        <option value="T8-9" <?php echo attr($check_res["check24"] == 'T8-9') ? "selected" : ""; ?> >T8-9</option>
                                        <option value="T9-10" <?php echo attr($check_res["check24"] == 'T9-10') ? "selected" : ""; ?> >T9-10</option>
                                        <option value="T10-11" <?php echo attr($check_res["check24"] == 'T10-11') ? "selected" : ""; ?> >T10-11</option>
                                        <option value="T11-12" <?php echo attr($check_res["check24"] == 'T11-12') ? "selected" : ""; ?> >T11-12</option>
                                        <option value="T12-L1" <?php echo attr($check_res["check24"] == 'T12-L1') ? "selected" : ""; ?> >T12-L1</option>
                                   </select> &emsp; &emsp;
                         L &emsp;
                         <select name="check25" id="check25" value = '<?php echo attr($check_res["check25"])? $check_res["check25"] : ""; ?>' style="margin-top:10px" >
                                        <option value="T1-2" <?php echo attr($check_res["check25"] == 'T1-2') ? "selected" : ""; ?> >T1-2</option>
                                        <option value="T2-3" <?php echo attr($check_res["check25"] == 'T2-3') ? "selected" : ""; ?> >T2-3</option>
                                        <option value="T3-4" <?php echo attr($check_res["check25"] == 'T3-4') ? "selected" : ""; ?> >T3-4</option>
                                        <option value="T4-5" <?php echo attr($check_res["check25"] == 'T4-5') ? "selected" : ""; ?> >T4-5</option>
                                        <option value="T5-6" <?php echo attr($check_res["check25"] == 'T5-6') ? "selected" : ""; ?> >T5-6</option>
                                        <option value="T6-7" <?php echo attr($check_res["check25"] == 'T6-7') ? "selected" : ""; ?> >T6-7</option>
                                        <option value="T7-8" <?php echo attr($check_res["check25"] == 'T7-8') ? "selected" : ""; ?> >T7-8</option>
                                        <option value="T8-9" <?php echo attr($check_res["check25"] == 'T8-9') ? "selected" : ""; ?> >T8-9</option>
                                        <option value="T9-10" <?php echo attr($check_res["check25"] == 'T9-10') ? "selected" : ""; ?> >T9-10</option>
                                        <option value="T10-11" <?php echo attr($check_res["check25"] == 'T10-11') ? "selected" : ""; ?> >T10-11</option>
                                        <option value="T11-12" <?php echo attr($check_res["check25"] == 'T11-12') ? "selected" : ""; ?> >T11-12</option>
                                        <option value="T12-L1" <?php echo attr($check_res["check25"] == 'T12-L1') ? "selected" : ""; ?> >T12-L1</option>
                                   </select><br>
                    </div>
                    <br>
                    <div  style="border:1px solid;padding-left:10px;padding-bottom:5px;">
                         <b >
                         Dr. Deuk	&emsp;&emsp;&emsp; <input type="text"  value="<?php echo attr($check_res["sign1"]); ?>"  name="sign1" id="sign1" style="width:45%;"><br>
                         Dr. DeMola &emsp;&emsp;&emsp;<input type="text"  value="<?php echo attr($check_res["sign2"]); ?>"  name="sign2" id="sign2" style="width:45%;"><br>
                         </b>
                    </div>
               </div> <!-- //row close -->
               <div class='col-6'>
                    <div class="" style="border:1px solid;font-weight:bold;padding-left:10px"> 
                    <u><b>Cervical / Cervicothoracic Diaqnosis:</b></u><br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 1) ? "checked" : ""; ?> value="1" name="check1" id="check1">&ensp; Thoracalgia (M54.6) <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 2) ? "checked" : ""; ?> value="2" name="check1" id="check2">&ensp; Spondylosis w/Myelopathy (M47.14) <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 3) ? "checked" : ""; ?> value="3" name="check1" id="check3">&ensp; Cervicobrachial Syndrome (M53.1)<br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 4) ? "checked" : ""; ?> value="4" name="check1" id="check4">&ensp; HHNP / disc bulge (myelopathy) (M51.04)<br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 5) ? "checked" : ""; ?> value="5" name="check1" id="check5">&ensp; HNP w/Radiculopathy or Radiculitis (M54.14)<br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 6) ? "checked" : ""; ?> value="6" name="check1" id="check6">&ensp;  Spondylosis (myelopathy) (M47.14)<br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 7) ? "checked" : ""; ?> value="7" name="check1" id="check7">&ensp;  HNP / disc bulge (M51.24)<br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 8) ? "checked" : ""; ?> value="8" name="check1" id="check8">&ensp; Stenosis (M48.04) <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 9) ? "checked" : ""; ?> value="9" name="check1" id="check9">&ensp; HNP/disc bulge w/Radiculopathy C7-T1 (M50.13) <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 10) ? "checked" : ""; ?> value="10" name="check1" id="check10">&ensp; Kyphosis, Postural Cervicothoracic region (M40.03)<br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 11) ? "checked" : ""; ?> value="11" name="check1" id="check11">&ensp; Stenosis - Cerv-Thor C7-T1 (M48.03)<br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 12) ? "checked" : ""; ?> value="12" name="check1" id="check12">&ensp;Carpal Tunnel Syndrome RT (G56.01) LT (G56.02) <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 13) ? "checked" : ""; ?> value="13" name="check1" id="check13">&ensp;Ulnar neuropathy RT (G56.21)LT (G56.22) <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 14) ? "checked" : ""; ?> value="14" name="check1" id="check14">&ensp; Weakness on Exam (M62.81) RLE / LLE / RUE I LUE <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 15) ? "checked" : ""; ?> value="15" name="check1" id="check15">&ensp;  Sensory deficit (R29.818) <br>
                         <input type="radio"  <?php echo ($check_res["check1"] == 16) ? "checked" : ""; ?> value="16" name="check1" id="check16">&ensp;  Facet Syndrome, Thoracic (M47.814) Thoracolumbar (M47.815) 
                    </div>
                    <br>
                    <b> A/P 1. <input type="text"  value="<?php echo attr($check_res["ap1"]); ?>"  name="ap1" id="ap1" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;2. <input type="text"  value="<?php echo attr($check_res["ap2"]); ?>"  name="ap2" id="ap2" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;3. <input type="text"  value="<?php echo attr($check_res["ap3"]); ?>"  name="ap3" id="ap3" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;4. <input type="text"  value="<?php echo attr($check_res["ap4"]); ?>"  name="ap4" id="ap4" style="width:85%;"><br>
                    &emsp;&emsp;&nbsp;&nbsp;5. <input type="text"  value="<?php echo attr($check_res["ap5"]); ?>"  name="ap5" id="ap5" style="width:85%;">
                    </b>
               </div>
          </div>
          <!-- <br>
                    
                    <br><br>
          <div align="center" class = 'row'>
                    <div  class = 'col-6' >
                    
                    </div>
                    <div class = 'col-6' > 
                    <div  style="border:1px solid;padding-left:10px;padding-bottom:5px;">
                    <label align='center' style="width:100%;"><input type="text"  value="<?php echo attr($check_res["pat_label"]); ?>"  name="pat_label" id="pat_label" style="width:85%;"><br>Patient Label</label></div>
     </div>
          </div> -->
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
               // alert(21);
               $(this).remove();
               var remove_val = $(this).css('top') + ',' +$(this).css('left')+ ',' +$(this).text()+'|';
               remove_val = remove_val.replaceAll('px','');
               var pos = $('#pos').val();
               $('#pos').val($('#pos').val().replace(remove_val, ""));

     });
</script>
</html>