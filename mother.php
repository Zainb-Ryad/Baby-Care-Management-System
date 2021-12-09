<?php 

if($_SESSION['type']=="mother"){
  ?>

   <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Mother Info</legend>
   <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px; color:#404040; text-align: center;background: #F7819F;">
    <div style="float: left; text-align: center;">
      <a href="?do=Mother_Info"  style="margin: 5px;"> Mother Info </a>
      <a href="?do=chat"  style="margin: 5px;"> Chat </a>
      <a href="?do=visit_schedule"  style="margin: 5px;"> Visit Schedule </a>
      <a href="?do=Previous_pregnancies"  style="margin: 5px;"> Previous Pregnancies </a>
      <a href="?do=Medical_obsterical_risks"  style="margin: 5px;"> Medical & Obsterical History Risks </a>
      <a href="?do=current_pregnancy_risks"  style="margin: 5px;"> Current Pregnancy Risks </a>
      <a href="?do=uss_examination" style="margin: 5px;"> USS Examination</a>
      <a href="?do=Antenatal_Follow_Up" style="margin: 5px;"> Medical Examination</a>
      <a href="?do=Postnatal_Examination" style="margin-right: 5px;">Postnatal Examination</a>
      <a href="?do=Family_Planning" style="margin-right: 5px;">Family Planning</a>
    </div>   
     <br>
  </div>  

   <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Children Info</legend>
   <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px; color:#404040; text-align: center;background: #F7819F;">
    <div style="float: left; text-align: center;">
      <a href="?do=Manage_Children" style="margin-right: 5px;">All Children</a>      
      <a href="?do=Newborn_Assesment" style="margin: 5px;">  Newborn Assesment </a> 
      <a href="?do=Baby_measurements" style="margin: 5px;">  Baby Measurements </a>     
      <a href="?do=Child_Preventive_Examinations" style="margin: 5px;">  Child Preventive Examinations </a>
      <a href="?do=Child_vaccination_program" style="margin: 5px;">Child Vaccination Program</a> 
      <a href="?do=vaccin_schedule" style="margin: 5px;">Vaccin Schedule</a> 
      <a href="?do=child_followUp_referred" style="margin: 5px;">  Child Follow-up & Referred </a> 
    </div>   
     <br>
  </div>

   <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Guides & Ads </legend>
   <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px; color:#404040; text-align: center;background: #F7819F;">
    <div style="float: left; text-align: center;">
      <a href="?do=create_ads" style="margin: 5px;">  Ads </a>
      <a href="?do=guides" style="margin-right: 5px;">Guides for a pregnant woman</a>
      <a href="?do=immunization_schedule" style="margin: 5px;">  Immunization (Vaccination)</a> 
      <a href="?do=Preventive_Investigations" style="margin: 5px;">  Preventive Investigations </a> 
      <a href="?do=breastfeeding" style="margin: 5px;">  Breastfeeding </a>   
      <a href="?do=Child_Nutrition" style="margin: 5px;">  Child's Nutrition </a> 
      <a href="?do=Child_Development" style="margin: 5px;">  Child's Development </a>
      <a href="?do=Domestic_Accidents" style="margin: 5px;"> Domestic Accidents  </a>
      <a href="?do=Sick_Child" style="margin: 5px;"> Sick Child  </a>
    </div>   
     <br>
  </div> 

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="vaccin_schedule"){?>
      <form method="post" action="" id="form" style="width: 1000px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Vaccine Schedule</legend><hr>
        <form method="post" action="">
          <p style="color: red;">to look your child vaccin schedule, only enter his/her birth day date*.</p>
          <input type="Date" name="birthday">
          <input type="submit" name="subschedule" value="show">
        </form> 

        <?php
        $arr = array();
        if (!empty($_POST['birthday'])) {
          $res=$config -> query("select * from child_vaccination_program where B_Date='".$_POST['birthday']."' 
          and mom_id='".$_SESSION['id']."' order by vaccine_date asc") or die($config -> error);
          while ($row =$res -> fetch_assoc()) {
            $arr[] = $row['vaccine_date'];
            $arr = array_values(array_unique($arr)); 
          }
          
        }?>     

        <?php if (isset($_POST["subschedule"])) {?>
          <?php if(empty($_POST['birthday'])){?>
            <?php  
            echo "<p style='color: red;font-size: 18px;'>Please, Enter Your Child BirthDay :) </p>";
            }else{
            $startdate = strtotime($_POST['birthday']);
            $enddate1 = strtotime("+1 Day", $startdate);
            $enddate2 = strtotime("+1 Month", $startdate);
            $enddate3 = strtotime("+2 Months", $startdate);
            $enddate4 = strtotime("+4 Months", $startdate);
            $enddate5 = strtotime("+6 Months", $startdate);
            $enddate6 = strtotime("+9 Months", $startdate);
            $enddate7 = strtotime("+12 Months", $startdate);
            $enddate8 = strtotime("+15 Months", $startdate);
            $enddate9 = strtotime("+6 Years", $startdate);
            $enddate10 = strtotime("+11 Years", $startdate);
            $enddate11 = strtotime("+14 Years", $startdate);
            ?>
            <br>
            <table style="font-size: 18px;">
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;background:#F7819F;width: 200px;text-align: center;">Vaccine Name</td>
                  <td style="border:1px solid #000;background:#F7819F;width: 200px;text-align: center;">Date of it</td>
                  <td style="border:1px solid #000;background:#F7819F;width: 200px;text-align: center;">Done?</td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;"align="center" id="vaccine_name">BCG</td>
                  <td style="border:1px solid #000;"align="center"><?php  echo date("Y-m-d", $enddate1);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate1)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Hepatitis B1</td>
                  <td style="border:1px solid #000;" align="center"><?php  echo date("Y-m-d", $enddate1);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate1)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">IPV1</td>
                  <td style="border:1px solid #000;" align="center"><?php  echo date("Y-m-d", $enddate2);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate2)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Hepatitis B2</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate2);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate2)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">IPV2</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate3);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate3)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">OPV1</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate3);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate3)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">DPT1</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate3);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate3)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Hib1</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate3);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate3)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">OPV2</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate4);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate4)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">DPT2</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate4);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate4)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Hib2</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate4);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate4)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">OPV3</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate5);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate5)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">DPT3</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate5);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate5)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                  
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Hib3</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate5);?></td>
                  <td style="border:1px solid #000;"align="center">
                 <?php
                 $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate5)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                   
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Hepatitis B3</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate5);?></td>
                  <td style="border:1px solid #000;"align="center">
                <?php
                $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate5)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                    
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Measles</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate6);?></td>
                  <td style="border:1px solid #000;"align="center">
                <?php
                $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate6)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                    
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">OPV4</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate7);?></td>
                  <td style="border:1px solid #000;"align="center">
                 <?php
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate7)) {
                      $result =  "Done :) ";
                    } 
                 }
                echo $result;
                ?>                    
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">DPT4</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate7);?></td>
                  <td style="border:1px solid #000;"align="center">
                <?php
                $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate7)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>                    
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">MMR</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate8);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate8)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">OPV5</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate9);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate9)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">DT</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate9);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate9)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">Rubella</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate10);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate10)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>
                  </td>
                </tr>
                <tr style="border:1px solid #000;">
                  <td style="border:1px solid #000;" align="center" id="vaccine_name">DT</td>
                  <td style="border:1px solid #000;" align="center"><?php echo date("Y-m-d", $enddate11);?></td>
                  <td style="border:1px solid #000;"align="center">
                  <?php
                  $result = "Not Done :( ";
                  for ($i=0; $i < count($arr) ; $i++) { 
                    if ($arr[$i] == date("Y-m-d" , $enddate11)) {
                      $result =  "Done :) ";
                    } 
                }
                echo $result;
                ?>
                  </td>
                </tr>
            </table>       
            <?php }?>        

        <?php } ?>
      </form>
    <?php }?>  
  </div>

    <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Baby_measurements"){?>
      <form method="post" action="" id="form" style="width: 1000px;">
          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Baby Measurements</legend><hr>
   <form method="post" action="">
    <p style="color: red;">to know your child measurements, only enter his/her serial num. *</p>
    <input type="text" name="child_serial_num" placeholder="Child Serial Num.">
     <input type="submit" name="draw_charts" value="Draw Charts">

      <div class="container" style="width:900px;">
        <h1>Weight/Height/HC-for-Age (Standard)</h1>
        <div id="chart3"></div>
        <br><hr><br>
        <h1>Weight-for-Height (Standard)</h1>
        <div id="chart4"></div>
        <br><hr><br>
        <h1>Weight/Height/HC-for-Age</h1>
        <div id="chart1"></div>
        <br><hr><br>
        <h1>Weight-for-Height</h1>
        <div id="chart2"></div>
      </div> 

      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

     <?php 
     if (isset($_POST["draw_charts"])) {
      $query1 = "select * from child_measurements where child_serial_num='".$_POST['child_serial_num']."'";
      $query2 = "select * from age_charts";
      $query3 = "select * from height_chart";
      $result1 = mysqli_query($config, $query1) or die($config -> error);
      $result2 = mysqli_query($config, $query2) or die($config -> error);
      $result3 = mysqli_query($config, $query3) or die($config -> error);
      $chart_data1 = '';
      $chart_data2 = '';
      $chart_data3 = '';
      $chart_data4 = '';
      while($row1 = mysqli_fetch_array($result1)){
        $chart_data1 .= "{ age:'".$row1["age"]."', weight:'".$row1["weight"]."', height:'".$row1["height"]."', HC:'".$row1["HC"]."'}, ";
        $chart_data2 .= "{ height:'".$row1["height"]."', weight:".$row1["weight"]."}, ";
      }
      while($row2 = mysqli_fetch_array($result2)){
        $chart_data3 .= "{ age:'".$row2["age"]."', weight_g:'".$row2["weight_g"]."', height_g:'".$row2["height_g"]."', HC_g:'".$row2["HC_g"]."', weight_b:'".$row2["weight_b"]."', height_b:'".$row2["height_b"]."', HC_b:'".$row2["HC_b"]."',}, ";
      }
      while($row3 = mysqli_fetch_array($result3)){
        $chart_data4 .= "{ height_g:'".$row3["height_g"]."', weight_g:'".$row3["weight_g"]."', weight_b:'".$row3["weight_b"]."'}, ";
      }
     }?>

      <script>
        Morris.Line({
          element : 'chart3',
          parseTime:false,
          data:[<?php echo $chart_data3; ?>],
          xkey:'age',
          ykeys:['weight_g','height_g','HC_g','weight_b','height_b','HC_b'],
          labels:['Weight_g','Height_g','HC_g','Weight_b','Height_b','HC_b'],
          hideHover:'auto',
        });
      </script>

      <script>
        Morris.Line({
          element : 'chart4',
          parseTime:false,
          data:[<?php echo $chart_data4; ?>],
          xkey:'height_g',
          ykeys:['weight_g','weight_b'],
          labels:['Weight_g','Weight_b'],
          hideHover:'auto',
        });
      </script>      

      <script>
        Morris.Line({
          element : 'chart1',
          parseTime:false,
          data:[<?php echo $chart_data1; ?>],
          xkey:'age',
          ykeys:['weight','height','HC'],
          labels:['Weight','Height','HC'],
          hideHover:'auto'
        });
      </script> 

      <script>
        Morris.Line({
          element : 'chart2',
          parseTime:false,
          data:[<?php echo $chart_data2; ?>],
          xkey:'height',
          ykeys:['weight'],
          labels:['Weight'],
          hideHover:'auto'
        });
      </script>

   </form>
 </form>
 <?php }?>
</div>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="create_ads"){?>
      <form method="post" action="">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Ads</legend><hr>
        <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px;color:#404040;background: #F7819F;text-align: center;">
          <?php
          $res=$config -> query("select * from create_ads order by id") or die($config -> error);
          while($row= $res -> fetch_assoc()){
            echo "*. ".$row['ad']."<br>";
          }
          ?>
        </div>
     </form>   
    <?php } ?>  
  </div>    

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="chat"){?>
      <form method="post" action="">
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Chat</legend><hr>

<?php
$res=$config -> query("select * from users where id='".$_SESSION['id']."'") or die($config -> error);
$row_login= $res -> fetch_assoc();
?>

<div id="wrapper" style="margin:0 auto;padding-bottom:25px;background:#EBF4FB;width:504px;border:1px solid #ACD8F0;">
    <div id="menu" style="padding:12.5px 25px 12.5px 25px;">
        <p class="welcome">Welcome <?php echo $row_login['name'];?></p>
        To:<p>
        <select name="msgto" id="msgto">
          <option value="" selected>Name</option>
          <?php
          $res=$config -> query("select type,name from users") or die($config -> error);
          while ($row= $res -> fetch_assoc()) {?>
            <option><?php echo $row['name']; ?></option>
          <?php }?>
        </select>
        </p>
        <div style="clear:both"></div>
    </div>    
    <div id="chatbox" style="text-align:left;margin:0 auto;margin-bottom:25px;padding:10px;background:#fff;height:270px;width:430px;
    border:1px solid #ACD8F0;overflow:auto;">
      <?php
      if(file_exists("log.txt") && filesize("log.txt") > 0){
        $handle = fopen('log.txt', 'r');
        $valid = false; // init as false
        while (($buffer = fgets($handle)) !== false) {
          if (strpos($buffer, $row_login['name']) !== false) {
            $valid = TRUE;
            echo $buffer."<br>";
          }      
        }
        fclose($handle);
      }?>
    </div>
     
    <form name="message" action="" method="post">
        <input name="usermsg" type="text" id="usermsg" size="63" style=" width:300px;border:1px solid #ACD8F0;" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" style=" width:60px;" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<?php if (isset($_POST["submitmsg"])) {
  if(isset($_POST['usermsg'])){
    $text=$_POST['usermsg'];
    $fp = fopen('log.txt', 'a');
    date_default_timezone_set("Asia/Jerusalem");
    $date = date('h:i a');
    fwrite($fp, " To: ".$_POST['msgto']." (".$date.") ".$row_login['name'].": ".$text."\n");
    fclose($fp);
  }
}
?>

<script type="text/javascript">
  //Load the file containing the chat log
  function loadLog(){   
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
    $.ajax({
      url: "log.txt",
      cache: false,
      success: function(html){    
        $("#chatbox").html(html); //Insert chat log into the #chatbox div 
        
        //Auto-scroll     
        var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
        if(newscrollHeight > oldscrollHeight){
          $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
        }       
        },
    });
  }
</script>
</form>
 <?php } ?> 
  </div><br><br> 

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="visit_schedule") { ?>
      <form method="post" action="" id="form" style="width: 1000px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Visit Schedule</legend><hr>
                <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">MotherName</td>
 <td style="border:1px solid #000;" align="center">MotherSerialNum</td>
 <td style="border:1px solid #000;" align="center">VisitDate</td>
 <td style="border:1px solid #000;" align="center">DoctorID</td>
 </tr>
 </thead>
 <?php
  $sql="select * from antenatal_follow_up";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=visit_schedule&mom_id=<?php echo $row["mom_id"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="80px">
  <input type="text" name="name" value="<?php echo $row['mother_name'];?>" style="width:80px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="80px">
  <input type="text" name="mom_id" value="<?php echo $row['mom_id'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="next_visit" value="<?php echo $row['next_visit'];?>" style="width:80px; height:25px;"/></td>  
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="doctor_id" value="<?php echo $row['doctor_id'];?>" style="width:80px; height:25px;"/></td>    
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table><br>
      </form>
    <?php } ?>
  </div>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Sick_Child") {?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Taking Care of a Sick Child</legend><hr>
        <div>
          <p style="font-size: 16px;color: #F7819F">Diarrhea:</p>
          <p>1. Drinking lots of fluids saves the child's life.</p>
          <p>2. Increasing the number and duration of breastfeeding.</p>
          <p>3. If the child is only on breastfeeding, give him the oral rehydration solution (ORS) or fresh water only.</p>
          <p>4. If the child is getting another food and not on breastfeeding, give him (ORS) and soup or fresh water.</p>
          <p>5. Keep giving your child more fluids until the diarrhea stops.</p>
          <p>6. Do not give the child any medication unless you consult a doctor.</p>
          <p style="font-size: 16px;color: #F7819F">A child with cough:</p>
          <p>1. Do not give the child any medication especially antibiotics without consulting a doctor.</p>
          <p>2. Increase the fluids and herbal drinks (chamomile and thyme).</p>
          <div style="display: flex;">
            <div>
              <p style="font-size: 16px;color: #F7819F">When you should bring your child to a health center:</p>
              <p>1. If he is sick and hasn't improved and/or becomes worse.</p>
              <p>2. The decrease in activity and mobility, the inability to feed from the breast.</p>
              <p>3. If he gets diarrhea with blood in the stool.</p>
              <p>4. If he has a cough with difficulty to breath and fast breathing.</p>
              <p>5. If he has a high temperature and convulsions.</p>
              <p>6. Constant crying and cold body,  constant vomit, dehydration or the signs of such as dry mouth, dry skin, sunken fontanel, losing of skin flexibility or lack of urination or becoming frail.</p>
            </div>
            <div><img src="vaccination.png" style="width: 200px;height: 200px;"></div>
          </div><br><br>
          <div style="display: flex;">
            <div>
              <p style="font-size: 16px;color: #F7819F">Directions to prepare the oral rehydration solution: ORS</p>
              <p>1. Wash hands with water and soap.</p>
              <p>2. Pour the rehydration salt in a clean and sealed container such as a bottle or a pot.</p>
              <p>3. Dissolve the contents of the box in a some cooled water that was previously boiled as mentioned on the container.</p>
              <p>4. Prepared quantity is to be used during 24 hours only. The remaining amount is to be disposed.</p>
            </div>
            <div><img src="sick_child.png" style="width: 200px;height: 200px;"></div>
          </div><br><br>
          <div style="display: flex;">
            <div>
              <p style="font-size: 16px;color: #F7819F">Preparing the ORS at home:</p>
              <p>1. Boil one liter of water for 1O minutes then cool it.</p>
              <p>2. Add four small spoons of sugar to the boiled water.</p>
              <p>3. Add one small spoon of salt to the boiled water.</p>
              <p>4. Add lemon juice 2-3 drops.</p>
              <p style="font-size: 16px;color: #F7819F">How to give the ORS to the child:</p>
              <p>1. A child who is less than 6 months is given 1/4 of a big cup (10-12) small spoons after each excretion.</p>
              <p>2. A child who is six months to a year is given half a big cup (20-42) small spoons after each excretion.</p>
              <p>3. A child who is more than one year is given one big cup after each excretion.</p>
            </div>
            <div><img src="ors.png" style="width: 250px;height: 400px;"></div>
          </div>

        </div>
      </div>
    <?php }?>  
  </div>

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Domestic_Accidents") {?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Domestic Accidents that Children Might Face</legend><hr>
        <div style="border: 1px solid #F7819F;padding: 2px;">
          <p style="font-size: 16px;color: #F7819F">  Children are the most vulnerable to accidents, because of the rapid growth and great desire of children to discover the world around them and the incomplete instincts of feeling danger and self-preservation for them.</p>
          <p style="font-size: 16px;color: #F7819F">  Mothers and fathers have a great role in protecting children from domestic accidents by taking preventive measures for that.</p>
        </div><br>
        <div style="display: flex;">
          <div>
            <p style="font-size: 16px;color: #F7819F">To protect your child from falling or slipping, we advise you with the following:</p>
            <p>- The necessity of having suitable light on the stairs at all times so the vision would be clear while going up and down the stairs.</p>
            <p>- Use protective means such as a banister for the stairs and the windows.</p>
            <p>- Keep the child away from playing near the stairs or the windows, especially if it is easy for the child to reach.</p>
            <p style="font-size: 16px;color: #F7819F">To protect your child from wounds, we advise you with the following:</p>
            <p>- Place knives and cutting tools in a big locked cabinet away from the reach of children and put the maintenance tools in a special locker.</p>
            <p>- Keep children away when preparing food and using sharp tools.</p>
            <p style="font-size: 16px;color: #F7819F">To protect your child from burns, we advice you with the following:</p>
            <p>- Not to locate the heating means in halls and keep it away from the furniture in order to avoid its fall and therefore the cause of fire.</p>
            <p>- Keep flammable material in a locked safe place.</p>
            <p>-  Place chemical liquids away from the reach of children and also put a sign to indicate the kind of material.</p>
            <p>-  Keep thechildren away from the kitchen while preparing food to avoid the spilling of hot water or oil on them.</p>
            <p style="font-size: 16px;color: #F7819F">To protect your child from poisoning, we advise you with the following:</p>
            <p>-  Keep toxic substances such as cleaning substances away from the reach of children.</p>
            <p>-  Not to put toxic material such as ( gasoline, petrol, insecticides) in pottery used for eating and drinking.</p>
            <p>-  Place drugs in a specific place such as a first-aid locker at home locked and away from the reach of children.</p>
            <p>-  Keep flammable substances in sealed places in unbreakable bottles and away from the reach of children.</p>
            <p style="font-size: 16px;color: #F7819F">To protect your child from suffocation:</p>
            <p>-  To have a good ventilating system at home especially in winter and not to leave the heater on while sleeping and make sure to turn it off when you are outside the room.</p>
            <p>-  Watch the children while playing and do not use toys that are easy to swallow. Do not leave young children to be taken care of by older children.</p>
          </div>
          <div><img src="accident.png" style="width: 300px;height: 700px;"></div>
        </div>
      </div>
    <?php }?>  
  </div>

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Child_Development") {?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child's Development</legend><hr>
        <div style="display: flex;">
          <div>
            <p style="font-size: 16px;color: #F7819F;">Dear mother observe your child:</p>
            <p>Note: there are variations in the development among children.</p>
            <p style="font-size: 16px;color: #F7819F;">After Birth:</p>
            <p>1. lays on his belly and moves his head from time to time.</p>
            <p>2. focuses his sight on his mother while breastfeeding him.</p>
            <p>3. frightens or becomes quiet when hearing a loud voice.</p>
            <p>4. calms down when his mother holds him.</p><br>
            <p style="font-size: 16px;color: #F7819F;">Three Months:</p>
            <p>1. becomes quiet or turns his head when hearing a sound.</p>
            <p>2. follows a colored toy at distance of 15-30 cm.</p>
            <p>3. lays down on his belly and holds his head up.</p>
            <p>4. interacts happily with playing and singing.</p>
            <p style="font-size: 16px;color: #F7819F;">Six Months:</p>
            <p>1. lays down on his belly and holds his head and chest up resting on his arms.</p>
            <p>2. if a rattle is placed in his hand, he holds It for several minutes.</p>
            <p style="font-size: 16px;color: #F7819F;">Nine Months:</p>
            <p>1. holds a toy in each hand and bangs them together.</p>
            <p>2. pays attention to music and songs coming from the TV or the radio.</p>
            <p>3. Imitates clapping hands.</p>
            <p style="font-size: 16px;color: #F7819F;">Twelve Months:</p>
            <p>1. understands the word 'no'.</p>
            <p>2. likes to discover everything around him.</p>
            <p>3. lifts himself up while lying down with the attempt to sit.</p>
            <p style="font-size: 16px;color: #F7819F;">Eighteen Months:</p>
            <p>1. walks by himself.</p>
            <p>2. drags big toys.</p>
            <p>3. holds a glass with both hands and drinks.</p>
            <p>4. helps while being dressed such as fitting up his hands.</p>
            <p style="font-size: 16px;color: #F7819F;">Twenty-four Months:</p>
            <p>1. names a picture or a familiar figure such as a cat.</p>
            <p>2. goes up the stairs without any help.</p>
            <p>3. feeds h mself with a spoon.</p>
            <p>4. plays games that requ re role-play such as to act as a policeman or doctor.</p>
            <p style="font-size: 16px;color: #F7819F;">Thirty-six Months:</p>
            <p>1. uses the bathroom alone.</p>
            <p>2. tens stones about what happened during the day.</p>            
          </div>
          <div><img src="development1.jpg" style="width: 600px;height: 600px;"></div>
        </div>
      </div><br><br>

      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Teeth</legend><hr>
        <div style="display: flex;">
          <div>
            <p>1. Teeth eruption is not accompanied by a sharp increase in temperature, diarrhea, or some diseases, as some believe.</p>
            <p>2. Maintaining the teeth is very necessary and begins with the use of the appropriate brush and paste after the first year.</p>
            <p>3. Stay away as much as possible from eating chocolate, candies, chips and soft drinks, and replace them with natural juices, due to their negative effects on children's dental health.</p>
            <p>4. Brushing your teeth after every meal.</p>
            <p>5. The use of a feeding bottle may lead to deformation of the jaws.</p><br>          
          </div>
          <div><img src="teeth1.jpg" style="width: 300px;height: 500px;"></div>
        </div>
      </div>

    <?php }?>  
  </div>

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Child_Nutrition") {?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child's Nutrition</legend><hr>
        <p style="font-size: 16px;color: #F7819F;">Breast milk Is the best food for the baby </p>
        <p>Breast milk is considered the best food for the baby. It is enough for the baby in the first six months of life and there is no need to add extra food or fluids even water. Mother should breast feed the baby immediately after delivery during the first hour, during that time there is no plenty of milk in the breast but with mother's efforts and repeated breast feeding will increase the let down of the milk and strengthen the emotional bond between the mother and the child.</p><br>

        <div style="display: flex;">
          <div>
            <p style="font-size: 16px;color: #F7819F;">Supplements:</p>
            <p>1. Give your child Vitamin (A + D) after birth and until he is one year of age (two drops in the mouth every day or as instructed by the health team) to strengthen and develop his bones.</p>
            <p>2. Give your child iron syrup when he is 6 months old until three years according to the doctor's or nurse's directions.</p>
            <p>3. Please do not stop giving supplements for the child because of its great importance.</p>
          </div>
          <div><img src="supplement.png" style="width: 200px;height: 200px;"></div>
        </div>

        <div style="display: flex;">
          <div>
            <p style="font-size: 16px;color: #F7819F;">By the end of the sixth months:</p>
            <p>There is a need for other nutrional elements. During this period, mother has to start giving the childcomplementary foods in addition to breast milk. She has to take into consideration the following:</p>
            <p>1. Start gradually giving the child well cooked cereals such as ground rice.</p>
            <p>2. Be sure that the cooked rice is soft at the beginning and increase its density gradually.</p>
            <p>3. Start with breast feeding first then give the ground rice.</p>
          </div>
          <div><img src="six_months.png" style="width: 250px;height: 200px;"></div>
        </div>

        <div style="display: flex;">
          <div>
            <p>After the child gets used to cooked cereals, start giving boiled mashed vegetables such as carrots, zucchini, and mashed potatoes by spoon and continue breastfeeding. You should take into consideration the following:</p>
            <p>1- Start giving him all kinds of mashed  vegetables  and fruit each kind separately and gradually. Monitor the acceptance of the child for this food or any signs of allergy on his body.</p>
            <p>2- Start giving the child mashed fruits such as apples, pears and bananas in addition to the breast milk.</p>
            <p>From the beginning of 8th months till the10th month you can add new foods to the child's meals such as yogurt, yogurt mixed with fruits, labaneh, egg yolk, minced meat (red lamb meat, chicken, chicken liver, and fish), dry beans ( beans, peas, lentil soup, chick peas) a little of olive oil should be added to the soup or other foods in order to supply the child with energy .
            </p>
            <p style="color: #F7819F;">•  Exclusive breastfeeding: to feed the child with the breast milk only and without giving him water or any other fluids such, chamomile, anise...etc.</p>
          </div>
          <div><img src="seven_months.png" style="width: 200px;height: 200px;"></div>
        </div>        

        <div style="display: flex;">
          <div>
            <p style="color: #F7819F;font-size: 16px;">From the beginning of 10th month :</p>
            <p>soft food which the child can hold in his hand can be added such as (boiled or fried potatoes, boiled carrots, bananas, biscuits and bread) with continuation of breast feeding and the previous food items.</p>
            <p>Start introducing the family food gradually to the child's meal to get used to the taste with the necesity of continuation of breast feeding.</p>
            <p style="color: #F7819F;font-size: 16px;">From the beginning of the 12th month :</p>
            <p>the childcan have an egg (white and yolk) and orange juice (especially to those children who show some kind of allergy to this juice before age of one year, you can introduce it now).</p>
            <p>The child can have the family meal in addition to breast feeding.</p>
          </div>
          <div><img src="ten_months.png" style="width: 250px;height: 200px;"></div>
        </div><br>

        <div style="display: flex;">
          <div>
            <p style="color: #F7819F;font-size: 16px;">After the first year(12-24 months):</p>
            <p>1. Continue to breastfeed as much as possible.</p>
            <p>2. Increase the portion of food that is given to the child in order to increase his energy so the number of meals is not less than six times daily.</p>
            <p>3. Have the child get used to eat balanced and different kinds of food which contains milk and dairy products, fruit and vegetables, cereals, meat, dry beans and oils.</p>
            <p>4. The child can be given whole milk, preferably fresh.</p>
            <p>5. Encourage the child to have the family's food and sit with them.</p>
          </div>
        </div>  <br>

        <div style="display: flex;">
          <div>
            <p style="color: #F7819F;font-size: 16px;">Child's nutrition; 2-5 years:</p>
            <p>1. This phase is very important in the grow1h and development of the child as he becomes more active, therefore, food is considered to be a basic element since the child is getting used to have the family's food at this phase.</p>
            <p>2. His meal is balanced and contains important nutritious elements for grow1h by having variation in the basic nutritious groups which are: meat, vegetables, fruit, cereals, milk and dairy products.</p>
            <p>3. Avoid soft drinks, soda, chocolates and chips, because of their negative impact on the child's health.</p>
            <p>4. Encourage the child to sit at the table with the family and depend on himself to eat.</p>
          </div>
          <div><img src="years.png" style="width: 200px;height: 200px;"></div>
        </div>  <br>

        <div style="display: flex;">
          <div>
            <p style="color: #F7819F;font-size: 16px;">General guidance to encourage the development of the child</p>
            <p>1. Teach your child how to eat, drink, play, run, dance, write, draw, count and read by using harmless means that would not harm the child and tangible means that surround him as well.</p>
            <p>2. Gradually incourage the child step by step, constantly and repeatedly.</p>
            <p>3. Do not force the child on a certain action and don't accept all demands if its un suitable.</p>
            <p>4. Praise the child when he succeeds in doing something that suits his age.</p>
            <p>5. Make him feel your love and tenderness.</p>
            <p>6. Don't hit or shout at the child as way of punishment because it is not a good way to raise up the child.</p>
          </div>
          <div><img src="general.png" style="width: 250px;height: 200px;"></div>
        </div><br>                                   

      </div>
    <?php }?>  
  </div>

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="breastfeeding") {?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Breastfeeding</legend><hr>
        <div style="display: flex;">
          <div>
            <p style="font-size: 16px;color: #F7819F;">Advantages of breast feeding:</p>
            <p>-Breastfeeding of the infant directly after delivery (colostrum) provides him with immunity and protects him from diseases. It also helps the uterus to contract and return to its actual size.</p>
            <p>-The mother's milk is always available and does not cost anything.</p>
            <p>-Breastfeeding reduces the chances of diarrhea and respiratory infection.</p>
            <p>-It also reduces the chances of a new pregnancy. </p>
            <p>-It enhances the emotional relationship between the mother and the child.</p>
         </div>
         <div>
           <img src="breastfeeding.png" style="width: 200px;height: 200px;">
         </div>
        </div> <br><hr><br>
        <div>
          <p style="font-size: 16px;color: #F7819F;">In order to breastfeed successfully the mother has to take care of the following:</p>
          <p>1. . Place the infant on the breast of mother immediately after birth to strengthen the emotional bond between the mother and the child and to increase the letdown of the milk.</p>
          <p>2. Make sure of the correct position of the infant on his mother's breast by inserting the nipple and part of the areola into the infant's mouth.</p>
          <p>3. Breastfeed the infant (whenever he wants) from both breasts rotationally during day or night. The infant should be kept at least for (15- 20) minutes on each side and the timing between each feed is not more than (2-3) hours.</p>
          <p>4. In case of the absence of the mother, she can squeeze milk from the breast to be kept in a container, and this could be given to the infant. Yet, she should take care of the hygiene during this process.</p>
          <p>5. Do not give a newborn any fluids, water, artificial feeding other than mother's milk up until six months. (It is possible to give medicine and supplements such as vitamins and iron as the doctor recommends.)</p>
          <p>6. It is advised not to give the infant a pacifier.</p>
          <p>7. Continue breastfeeding the child if he gets sick or has diarrhea.</p>
          <p>8. The correct position for the mother and the child while breastfeeding:</p>
          <p>a. It is possible to breast feed the baby while the mother is in a sitting up or lying position. Sit in a correct healthy position so the back is held up. Pillows can be used.</p>
          <p>b. In any position the mother chooses, the whole body of the child should be facing the mother's body while his head is held in a way to be straight along with his body and facing the mother's breast.</p>
        </div><br>
      </div>
    <?php }?>    
  </div>

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Preventive_Investigations") {?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Preventive Investigations (Neonatal Screening Test)</legend><hr>
        <p>The PKU (Phenyle Ketone Uria) and the TSH ( Thyroid Gland investigations) which is known as Foot Heel Test </p>
        <p>1. For your child's health and growth go to the nearest MCH health center after three days from delivery in order to check the blood from the foot heel.</p>
        <p>2. The Phenyl Ketone Uria (PKU) is an enzymatic disorder in the infant's body that affects the development of the brain and therefore leads to mental retardation.</p>
        <p>3. The lack of thyroid gland secretions results from the lack of iodine that is very essential for the growth of the brain and the body.</p>
        <p>4. Checkups and early detection of diseases and early treatment can reduce the damages for the children and enable them to live a normal and healthy life.</p>
      </div>
    <?php }?>  
  </div><br><br>

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="guides") {?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Guides for a pregnant woman</legend><hr>
        <div>
          <p>Health care is essential from the beginning of pregnancy until the end and you can choose the nearest MCH center in order to receive a proper health care which consists of the following:</p><br>

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Pregnant Care:</p>
          <p>Taking care of a pregnant woman is done by monitoring the fetus's movement, its heartbeat, size, age, weight, the mother's blood pressure, and urine tests in addition to measuring the Hb in blood and providing health education .</p>
        </div>
        <div>
          <img src="pregnant_care.png" style="width: 200px;height: 200px;"> 
        </div>     
      </div>

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Tetanus vaccination:</p>
          <p>A tetanus vaccine can be taken at any time from the beginning of pregnancy until two weeks before delivery.</p>
        </div>
        <div>
          <img src="tetanus_vaccination.png" style="width: 200px;height: 150px;"> 
        </div>     
      </div>  

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Nutrition of pregnant woman :</p>
          <p>A pregnant woman is advised to drink a lot of water and fresh juice as well as to eat nutritious food that is rich in iron such as (red meat, egg yolk, liver, green and yellow leaved vegetables, legumes (lentil, chick-peas etc...) and food rich in calcium such as milk and dairy products (yogurt, cream cheese, etc...).</p>
        </div>
        <div>
          <img src="nutrition.png" style="width: 200px;height: 150px;"> 
        </div>     
      </div>

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Supplements :</p>
          <p>In order to be protected from anemia, take iron pills and folic acid during the pregnancy period and until three months after delivery.
            If you want to drink tea then it is advised to have it after two hours from taking iron tablet.
            Some side effects might occur as a result of taking supplements such as constipation, abdominal colic; yet do not worry as
          these are temporary symptoms.</p>
        </div>
        <div>
          <img src="supplements.png" style="width: 200px;height: 200px;"> 
        </div>     
      </div> 

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Personal hygiene and physical exercise :</p>
          <p>Taking care of the personal hygiene such as taking daily baths, wearing clean, loose-fitting cotton clothes and doing some physical exercise during pregnancy and after delivery is advisable.</p>
          <p style="background: #F7819F;font-size: 16px;text-align: center;">Dear mother, make sure to wear loose clothes and comfortable shoes and not to overexposure to x-rays, and not to smoke throughout pregnancy.</p>
        </div>     
      </div>  

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Dental care :</p>
          <p>Taking care of the teeth and using a toothbrush correctly is advisable .
          Don't hesitate to visit a dentist for a regular checkup for teeth and treat them while being pregnant.</p>
          <p style="color: #F7819F;font-size: 16px;">Medication :</p> 
          <p>Do not take medication during pregnancy unless you consult a doctor.</p>    
        </div>
        <div>
          <img src="dental.png" style="width: 150px;height: 200px;"> 
        </div>     
      </div>

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Rest, Relaxation and Sleep :</p>
          <p>Take enough time to rest during the day, this helps you to be relaxed and eases the tension.
          Make sure to get at least 8-10 hours sleep during the night.</p>
        </div>
        <div>
          <img src="rest.png" style="width: 200px;height: 200px;"> 
        </div>              
      </div>

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Psychological support :</p>
          <p>Psychological support is necessary for a pregnant woman from the family and especially the husband</p>
          <p style="color: #F7819F">Dear mother make sure to wear loose-fitting cotton clothes and comfortable footwear. Do not get exposed to x-ray and do not smoke during the whole period of pregnancy.</p>
        </div>
        <div>
          <img src="support.png" style="width: 200px;height: 200px;"> 
        </div>              
      </div>  

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Prepare yourself for breastfeeding :</p>
          <p>-Be prepared to breastfeed your baby immediately during the first hour after birth.</p>
          <p>-Colostrum milk provides the newborn with all kinds of nutrition and immunity that he needs during the first days</p>
          <p>-Don't give any food or fluids other than breast milk in the first 6 months of the infant's life.</p>
          <p>-There is no need to massage or put some creams on the nipple during pregnancy </p>
        </div>              
      </div>   <br> 

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Caution signs :</p>
          <p>Do not hesitate to seek medical advice from the clinic when noticing any of the following signs:</p>
          <p>1. Swollen hands and face.</p>
          <p>2. Headache and blurring of vision.</p>
          <p>3. Vaginal bleeding or rupture of the membranes. (watery vaginal discharge)</p>
          <p>4. Constant pain in the back and the abdomen.</p>
          <p>5. Severe and constant vomit.</p>
          <p>6. Absence or decrease in fetal movement.</p>
        </div>
        <div>
          <img src="caution.png" style="width: 200px;height: 200px;"> 
        </div>              
      </div>   <br> 

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Signs of the due date for delivery (labor pain) :</p>
          <p>Go to the nearest birth center immediately when any of the following signs appear:</p>
          <p>1. The labor pains appear every 10-20 minutes or more but the real labor starts when labor pains become regular (the same period of time between the pains).</p>
          <p>2. Breaking of a pinkish mucus or mixed with blood or colorless.</p>
          <p>3. The breaking of pure water from the vagina .</p>
          <p>Set a plan with your family to be prepared for the situation and to be aware of what to do and where to go, and who will help you if any of these signs appear or if labor is due.</p>
        </div>
        <div>
          <img src="delivery.png" style="width: 200px;height: 200px;"> 
        </div>              
      </div>    <br>

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">After birth care :</p>
          <p>Psychological support for the mother by the father and the family is very important.</p>
          <p>Health care for the mother and the baby after delivery is extremely important and this care is offered in all mother and child health centers.</p>
          <p style="color: #F7819F;font-size: 16px;">Cervical swab and breast examination :</p>
          <p>Make sure to follow-up on the regular checkups for early detection of breast and cervical cancer</p>
        </div>
        <div>
          <img src="after_birth.png" style="width: 200px;height: 200px;"> 
        </div>                       
      </div>    <br>

      <div style="display: flex;">
        <div>
          <p style="color: #F7819F;font-size: 16px;">Taking care of the newborn :</p>
          <p>1. It isvery important to maintain thechild's temperature to be similar to the room's temperature and not to wrap the infant in a way that limits his movement.</p>
          <p>2. It is inadmissible to use a strange material such as the Arabic eyeliner powder  (Kohleh),  and  coffee in order to enhance the healing of the belly button (umbilicus).</p>
          <p>3. Do not use salt for the infant skin</p>
          <p>4. Please take care of the daily bath of the infant with water and soap and to dry the belly button very well and to make sure that the infant is not exposed to air drafts.</p>
        </div>
        <div>
          <img src="newborn.png" style="width: 150px;height: 250px;"> 
        </div>              
      </div>    <br>      

        </div>
      </div>
    <?php }?>
  </div>

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="immunization_schedule"){?>
      <div id="form" style="width:1020px;">
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Immunization (Vaccination)</legend><hr>
      <div style="display: flex;">
        <div>
          <p>1. In order to protect your child from having diseases or mental retardation, go to the nearest health center to your residence and keep on going to the vaccination appointments.</p>
          <p>2. The Palestinian national vaccine program was set to protect the Palestinian child from the following diseases:</p>
          <p>Tuberculosis, Hepatitis B, Poliomyelitis, Tetanus, Diphtheria, Whooping Cough, Measles, Rubella, Mumps and Meningitis.</p>
          <p>And also what the Palestinian Ministry of Health decides regarding recent diseases that requires vaccination.</p>
        </div>
        <div>
          <img src="vaccination.png" style="width: 200px;height: 200px;"> 
        </div>              
      </div><br><br>

        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Immunization Schedule</legend><hr>
        <table border="1" cellpadding="0" cellspacing="0" style="border:1px solid #000; background:#FFF;">
          <thead style="font-family: sans-serif;">
            <tr>
              <td style="border:1px solid #000;background:#F7819F;" align="center">Child's age</td>
              <td style="border:1px solid #000;background:#F7819F;" align="center" colspan="4">Name of Vaccine</td>
            </tr>
          </thead>  
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">1 Day</td>
              <td style="border:1px solid #000;" align="center">BCG , Hepatitis B1</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">1 Month</td>
              <td style="border:1px solid #000;" align="center">IPV1 , Hepatitis B2</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">2 Months</td>
              <td style="border:1px solid #000;" align="center">IPV2 , OPV1 , DPT1 , Hib1</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">4 Months</td>
              <td style="border:1px solid #000;" align="center">OPV2 , DPT2 , Hib2</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">6 Months</td>
              <td style="border:1px solid #000;" align="center">OPV3 , DPT3 , Hib3 , Hepatitis B3</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">9 Months</td>
              <td style="border:1px solid #000;" align="center">Measles</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">12 Months</td>
              <td style="border:1px solid #000;" align="center">OPV4 , DPT4</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">15 Months</td>
              <td style="border:1px solid #000;" align="center">MMR</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">First Grade</td>
              <td style="border:1px solid #000;" align="center">OPV5 , DT</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">Sixth Grade (female)</td>
              <td style="border:1px solid #000;" align="center">Rubella</td>
            </tr>
            <tr style="border:1px solid #000;">
              <td style="border:1px solid #000;background:#F7819F;">Ninth Grade</td>
              <td style="border:1px solid #000;" align="center">DT</td>
            </tr>
        </table><br><br>
      <br><br>
        <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#FFF;">
          <thead style="font-family: sans-serif;">
            <tr>
              <td style="border:1px solid #000;background:#F7819F;" align="center">Vaccines</td>
              <td style="border:1px solid #000;background:#F7819F;" align="center">Dose</td>
              <td style="border:1px solid #000;background:#F7819F;" align="center">Route</td>
              <td style="border:1px solid #000;background:#F7819F;" align="center">Info</td>
              <td style="border:1px solid #000;background:#F7819F;" align="center">Side Effects</td>
              <td></td>
            </tr>
          </thead>
          <tr>
            <td style="border:1px solid #000;" align="center">Hep.B</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM</td>
            <td style="border:1px solid #000;" align="center">It is given to babies at birth and at 8, 12 and 16 weeks of age in the thigh muscle.The vaccine gives protection against the hepatitis B virus.</td>
            <td style="border:1px solid #000;" align="center">Swelling and redness with slight and temporary pain at the site of the needle, which may be accompanied by a high temperature in the child.</td>
          </tr>
          <tr>
            <td style="border:1px solid #000;" align="center">BCG</td>
            <td style="border:1px solid #000;" align="center">0.05 ml</td>
            <td style="border:1px solid #000;" align="center">Intradermal</td>
            <td style="border:1px solid #000;" align="center">It is given to babies at birth in the upper part of the skin of the left arm. This vaccine protects against meningitis and spreading TB disease (miliary TB).</td>
            <td style="border:1px solid #000;" align="center">Swelling and redness at the site of the needle develops into vesicles and ulcers within two to 4 weeks, and these symptoms usually resolve within two to five months and a permanent scar remains in its place, and the lymph nodes of the armpit also swell and remain within two to 4 months after the vaccination.</td>            
          </tr>
          <tr>
            <td style="border:1px solid #000;" align="center">IPV</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM/S.C</td>
            <td style="border:1px solid #000;" align="center">In the first month of birth, children are given in the arm muscle (deltoid) in two doses. This vaccine protects against polio.</td>
            <td style="border:1px solid #000;" align="center">Swelling and redness at the needle site, sometimes accompanied by heat.</td>
          </tr>  
          <tr>
            <td style="border:1px solid #000;" align="center">OPV</td>
            <td style="border:1px solid #000;" align="center">2 Drops</td>
            <td style="border:1px solid #000;" align="center">Oral</td>
            <td style="border:1px solid #000;" align="center">It is given to children in five doses in the second, fourth, sixth and eighteenth months, and when they are six years old, in the form of two drops by mouth. This vaccine protects against polio.
            </td>
            <td style="border:1px solid #000;" align="center">--</td>
          </tr> 
          <tr>
            <td style="border:1px solid #000;" align="center">Rotavac</td>
            <td style="border:1px solid #000;" align="center">0.5 ml,5 Drops</td>
            <td style="border:1px solid #000;" align="center">Oral</td>
            <td style="border:1px solid #000;" align="center">It is given to children in three doses in the second, fourth and sixth months in the form of five drops by mouth, an amount of 0.5 ml. This vaccine protects against cases of diarrhea.</td>
            <td style="border:1px solid #000;" align="center">The child may develop intestinal intussusception in some cases, which are rare, and this causes continuous intense crying and also causes diarrhea, and in both cases, the health center must be reviewed as soon as possible.</td>
          </tr> 
          <tr>
            <td style="border:1px solid #000;" align="center">PCV</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM</td>
            <td style="border:1px solid #000;" align="center">It is given to children in three doses in the second, fourth and twelfth month, into the muscle of the thigh. This vaccine is a streptococcal pneumococcal vaccine. It protects against pneumonia, meningitis, ear and sinusitis, and blood poisoning.</td>
            <td style="border:1px solid #000;" align="center">Redness at the site of the needle and discomfort.</td>
          </tr>
          <tr>
            <td style="border:1px solid #000;" align="center">Penta Vaccine</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM</td>
            <td style="border:1px solid #000;" align="center">It is given to children in three doses in the second, fourth and sixth months of the thigh muscle. This vaccine is more than one vaccine (hepatitis B vaccine, diphtheria, tetanus, whooping cough, Haemophilus influenzae).</td>
            <td style="border:1px solid #000;" align="center">Swelling, redness, pain at the site of the needle, a rise in temperature and discomfort, in the event of continuous crying for several hours during the first 24 hours after the graft, please go to the nearest health center.</td>
          </tr> 
          <tr>
            <td style="border:1px solid #000;" align="center">Hib</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM</td>
            <td style="border:1px solid #000;" align="center">It is given to children as a Penta Vaccine graft into the thigh muscle. This vaccine protects against Haemophilus influenzae.</td>
            <td style="border:1px solid #000;" align="center">--</td>
          </tr>
          <tr>
            <td style="border:1px solid #000;" align="center">MMR</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM/S.C</td>
            <td style="border:1px solid #000;" align="center">It is given to children in two doses in the twelfth and eighteenth months of the arm muscle (deltoid). This vaccine protects against measles, rubella and mumps.</td>
            <td style="border:1px solid #000;" align="center">A high temperature, and a rash may appear a week after the vaccination is given. It lasts for two to 3 days. Some lymph nodes in the neck may swell and some salivary glands may swell.</td>
          </tr> 
          <tr>
            <td style="border:1px solid #000;" align="center">DPT</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM</td>
            <td style="border:1px solid #000;" align="center">It is given to children in one strengthening dose in the 18th month of the thigh muscle. This vaccine is a triple vaccine that protects against diphtheria, tetanus and whooping cough.</td>
            <td style="border:1px solid #000;" align="center">Swelling and redness at the site of the needle slightly and temporarily with a high temperature, in very few cases the temperature is very high and irritation of the child.</td>
          </tr> 
          <tr>
            <td style="border:1px solid #000;" align="center">DT</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM</td>
            <td style="border:1px solid #000;" align="center">It is given to first graders in the thigh muscle. This vaccine protects against diphtheria and tetanus.</td>
            <td style="border:1px solid #000;" align="center">--</td>
          </tr>  
          <tr>
            <td style="border:1px solid #000;" align="center">Td</td>
            <td style="border:1px solid #000;" align="center">0.5 ml</td>
            <td style="border:1px solid #000;" align="center">IM</td>
            <td style="border:1px solid #000;" align="center">It is given to ninth grade students in the arm muscle (deltoid). This vaccine protects against diphtheria and tetanus.</td>
            <td style="border:1px solid #000;" align="center">--</td>
          </tr>                                                                                                        
        </table>
    <?php }?>  
  </div>  

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Family_Planning"){?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Family Planning</legend><hr>
        <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">FamilyPlanningMethod</td>
 <td style="border:1px solid #000;" align="center">WasItSuccessful?</td>
 <td style="border:1px solid #000;" align="center">others</td>
 <td style="border:1px solid #000;" align="center">ChosenMethod</td>
 </tr>
 </thead>
 <?php
  $sql="select * from family_planning where mom_id='".$_SESSION["id"]."'";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Family_Planning&mom_id=<?php echo $row["mom_id"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="method" value="<?php echo $row['family_planning_method'];?>" style="width:50px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="q3" value="<?php echo $row['q3'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="q4" value="<?php echo $row['q4'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="q5" value="<?php echo $row['q5'];?>" style="width:80px; height:25px;"/></td>     
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table><br>     
      </div>

      <div style="text-align: center;display: flex;">
        <img src="family-planning.png" style="vertical-align: middle;width: 400px;height: 300px;">     
        <p style="color: #F7819F;font-size: 22px;display: inline;"><strong>One of the goals and benefits of family planning is spacing pregnancyperiods to maintain the health of the mother and the child.</strong></p>
      </div>
    <?php }?>  
  </div>  

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Postnatal_Examination"){?>
      <div id="form" style="width: 1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Postnatal Examination</legend><hr>
        <p style="color: red;">If you want to know all of your postnatal examination results, just enter your id in the search box *</p>
          <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from postnatal_examination where mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $postnatal_assessment = $row['postnatal_assessment'];
      $date_of_visit = $row['date_of_visit'];
      $days_after_delivery = $row['days_after_delivery'];
      $temperature = $row['temperature'];
      $pulse = $row['pulse'];
      $BP = $row['BP'];
      $bleeding_after_delivery = $row['bleeding_after_delivery'];
      $Hb = $row['Hb.'];
      $DVT = $row['DVT'];
      $rupture_uterus = $row['rupture_uterus'];
      $if_yes = $row['if_yes'];
      $lochia_colour = $row['lochia_colour'];
      $incision_CS = $row['incision_C.S'];
      $seizures = $row['seizures'];
      $blood_transfusion = $row['blood_transfusion'];
      $breasts = $row['breasts'];
      $fundal_height = $row['fundal_height'];
      $family_planning_counseling = $row['family_planning_counseling'];
      $FP_appointment = $row['FP_appointment'];
      $recommendations = $row['recommendations'];
      $remarks = $row['remarks'];
      $doctor_name = $row['doctor_name'];     

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' postnatal assesment= '.$postnatal_assessment.' <br> date of visit= '
      .$date_of_visit.' <br> days after delivery= '.$days_after_delivery.' <br> temperature= '.$temperature.' <br> pulse= '.$pulse.
      ' <br> BP= '.$BP.' <br> bleeding after delivery= '.$bleeding_after_delivery.' <br> Hb.= '.$Hb.
      ' <br> DVT= '.$DVT.' <br> rupture uterus= '.$rupture_uterus.' ,if yes= '.$if_yes.' <br> lochia colour= '.$lochia_colour.
      ' <br> incision CS= '.$incision_CS.' <br> seizures= '.$seizures.' <br> blood transfusion= '.$blood_transfusion.' <br> breasts= '.$breasts.' <br> fundal height= '.$fundal_height.' <br> family planning counseling= '.$family_planning_counseling.' <br> FP appointment= '.$FP_appointment.' <br> recommendations= '.$recommendations.' <br> remarks= '.$remarks.' <br> doctor name= '.$doctor_name.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
      </div>
    <?php } ?>  
  </div>  

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Antenatal_Follow_Up"){?>
      <div id="form" style="width: 1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Medical Examination</legend><hr>
                <p style="color: red;">If you want to know all of your results about Medical Examination, just enter your id in the search box *</p>
          <form method="post" action="">
   <input type="text" name="search1" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search1'])) {
  $searchq = $_POST['search1'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from medical_examination where mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $date = $row['date'];
      $height = $row['height'];
      $body_mass_index = $row['body_mass_index'];
      $general_examination = $row['general_examination'];
      $head_neck = $row['head_neck'];
      $heart = $row['heart'];
      $breast = $row['breast'];
      $lung = $row['lung'];
      $abdomen = $row['abdomen'];
      $lower_limbs = $row['lower_limbs'];
      $dt_vaccination = $row['dt_vaccination'];
      $other_vaccination = $row['other_vaccination'];
      $specify = $row['specify'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' date= '.$date.' <br> height= '.$height.
      ' <br> body mass index= '.$body_mass_index.' <br> general examination= '.$general_examination.
      ' <br> head & neck= '.$head_neck.' <br> heart= '.$heart.
      ' <br> breast= '.$breast.' <br> lung= '.$lung.' <br> abdomen= '.$abdomen.' <br> lower limbs= '.$lower_limbs.
      ' <br> dt vaccination= '.$dt_vaccination.' <br> other vaccination= '.$other_vaccination.' <br> specify= '.$specify.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
</div>
<br><br>

      <div id="form" style="width: 1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Antenatal Follow Up</legend><hr>
        <p style="color: red;">If you want to know all of your results about Follow Up, just enter your id  in the search box *</p>
          <form method="post" action="">
   <input type="text" name="search2" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search2'])) {
  $searchq = $_POST['search2'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from antenatal_follow_up where mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $date = $row['date'];
      $BP = $row['BP'];
      $odema = $row['odema'];
      $weight = $row['weight'];
      $urine_stick = $row['urine_stick'];
      $FHS = $row['FHS'];
      $gestational_age_date = $row['gestational_age_date'];
      $gestational_age_Size_cm = $row['gestational_age_Size/cm'];
      $presentation = $row['presentation'];
      $complaint_management_medication_remarks = $row['complaint_management_medication_remarks'];
      $supplements = $row['supplements'];
      $next_visit = $row['next_visit'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' date= '.$date.' <br> BP= '.$BP.' <br> odema= '.$odema.
      ' <br> weight= '.$weight.' <br>urine_stick= '.$urine_stick.' <br> FHS= '.$FHS.
      ' <br> gestational age date= '.$gestational_age_date.' <br> gestational age Size/cm= '.$gestational_age_Size_cm.
      ' <br> presentation= '.$presentation.' <br> complaint management medication remarks= '.$complaint_management_medication_remarks.
      ' <br> supplements= '.$supplements.' <br> next visit= '.$next_visit.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
      </div>  
    <?php }?>        
  </div>

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="uss_examination"){?>
      <div id="form" style="width: 1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">U/S</legend><hr>
        <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">Gravida</td>
 <td style="border:1px solid #000;" align="center">Parity</td>
 <td style="border:1px solid #000;" align="center">Abortions</td>
 <td style="border:1px solid #000;" align="center">LMP</td>
 <td style="border:1px solid #000;" align="center">EDD</td>
 </tr>
 </thead>
 <?php
  $sql="select * from u_s where mom_id='".$_SESSION["id"]."'";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=child_followup_referred&mom_id=<?php echo $row["mom_id"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="gravida" value="<?php echo $row['gravida'];?>" style="width:50px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="parity" value="<?php echo $row['parity'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="abortions" value="<?php echo $row['abortions'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="LMP" value="<?php echo $row['LMP'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="EDD" value="<?php echo $row['EDD'];?>" style="width:80px; height:25px;"/></td>       
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table>
 <br><br><br>   

 <div id="form" style="width: 1020px;">
   <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Antenatal Ultrasound Scan Examination</legend><hr>
        <p style="color: red;">If you want to know all of your results about Ultrasound Scan Examination, just enter your id  in the search box *</p>
          <form method="post" action="">
   <input type="text" name="search1" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search1'])) {
  $searchq = $_POST['search1'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from uss_examination where mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $gestation_week = $row['gestation_week'];
      $no_of_fetuses = $row['no._of_fetuses'];
      $heart_activity = $row['heart_activity'];
      $placenta = $row['placenta'];
      $presentation = $row['presentation'];
      $fetal_sex = $row['fetal_sex'];
      $quantity_liquor = $row['quantity_liquor'];
      $deep_packet_liquor = $row['deep_packet_liquor'];
      $AFI_liquor = $row['AFI_liquor'];
      $GS = $row['GS'];
      $CRL = $row['CRL'];
      $BPD = $row['BPD'];
      $FL = $row['FL'];
      $AC = $row['AC'];
      $EGA = $row['EGA'];
      $EFW = $row['EFW'];
      $EDD = $row['EDD'];
      $congenital_anomalies = $row['congenital_anomalies'];
      $suspected_large_for_geatational_age_fetus = $row['suspected_large_for_geatational_age_fetus'];
      $suspected_intrauterine_growth_restriction = $row['suspected_intrauterine_growth_restriction'];
      $suspected_small_for_gestational_age_fetus = $row['suspected_small_for_gestational_age_fetus'];
      $doctor_name = $row['doctor_name'];
      $doctor_id = $row['doctor_id'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' gestation week= '.$gestation_week.' <br> no. of fetuses= '
      .$no_of_fetuses.' <br> heart activity= '.$heart_activity.' <br> placenta= '.$placenta.' <br> presentation= '.$presentation.
      ' <br> fetal sex= '.$fetal_sex.' <br> quantity liquor= '.$quantity_liquor.' <br> deep packet liquor= '.$deep_packet_liquor.
      ' <br> AFI liquor= '.$AFI_liquor.' <br> GS= '.$GS.' <br> CRL= '.$CRL.' <br> BPD= '.$BPD.
      ' <br> FL= '.$FL.' <br> AC= '.$AC.' <br> EGA= '.$EGA.' <br> EFW= '.$EFW.' <br> EDD= '.$EDD.' <br> congenital anomalies= '.$congenital_anomalies.' <br> suspected_large_for_geatational_age_fetus= '.$suspected_large_for_geatational_age_fetus.' <br> suspected intrauterine growth restriction= '.$suspected_intrauterine_growth_restriction.' <br> suspected_small_for_gestational_age_fetus= '.$suspected_small_for_gestational_age_fetus.' doctor name= '.$doctor_name.' <br> doctor_id= '.$doctor_id.'</div>'; 
    }
  }
 }
 print("$output");
 ?>   
 </div>
 <br><br>

 <div id="form" style="width: 1020px;">
   <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Lab Test</legend><hr>
           <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">Date</td>
 <td style="border:1px solid #000;" align="center">BloodGroup</td>
 <td style="border:1px solid #000;" align="center">RhTyping</td>
 <td style="border:1px solid #000;" align="center">IndirectComb’s</td>
 </tr>
 </thead>
 <?php
  $sql="select * from lab_test where mom_id='".$_SESSION["id"]."'";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=uss_examination&mom_id=<?php echo $row["mom_id"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="80px">
  <input type="text" name="visit_date" value="<?php echo $row['visit_date'];?>" style="width:80px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="BloodGroup" value="<?php echo $row['result1'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="RhTyping" value="<?php echo $row['result2'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="IndirectComb’s" value="<?php echo $row['result3'];?>" style="width:80px; height:25px;"/></td>       
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table>
 <br><br><br> 
 </div>

 <div id="form" style="width: 1020px;">
   <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Complete Blood Count</legend><hr>
        <p style="color: red;">If you want to know all of your results about Complete Blood Count, just enter your id in the search box *</p>
          <form method="post" action="">
   <input type="text" name="search2" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search2'])) {
  $searchq = $_POST['search2'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from cbc where mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $visit_date = $row['visit_date'];
      $result1 = $row['result1'];
      $result2 = $row['result2'];
      $result3 = $row['result3'];
      $result4 = $row['result4'];
      $result5 = $row['result5'];
      $result6 = $row['result6'];
      $result7 = $row['result7'];
      $result8 = $row['result8'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' visit date= '.$visit_date.' <br> White Blood Cell= '
      .$result1.' <br> Hemoglobin= '.$result2.' <br> Hematocrit= '.$result3.' <br> Mean Corpuscular Volume= '.$result4.
      ' <br> Platelets= '.$result5.' <br> Fasting Blood Sugar= '.$result6.' <br> Random Blood Sugar= '.$result7.
      ' <br> Glucose Tolerance Test (GCT)= '.$result8.'</div>'; 
    }
  }
 }
 print("$output");
 ?>   
 </div>
 <br><br>

  </div>
<?php }?>

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="current_pregnancy_risks"){?>
      <div id="form" style="width: 1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Current Pregnancy Risks</legend><hr>
        <p style="color: red;">If you want to know all of your current pregnancy risks  results, just enter your id in the search box*</p>
          <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from current_risks where mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $gestational_age= $row['gestational_age'];
      $q2 = $row['q2'];
      $q3 = $row['q3'];
      $q4 = $row['q4'];
      $q5 = $row['q5'];
      $q6 = $row['q6'];
      $q7 = $row['q7'];
      $q8 = $row['q8'];
      $q9 = $row['q9'];
      $q10 = $row['q10'];
      $q11 = $row['q11'];
      $q12 = $row['q12'];
      $q13 = $row['q13'];
      $q14 = $row['q14'];
      $q15 = $row['q15'];
      $q16 = $row['q16'];
      $others = $row['others'];
      $who_perform_assesment = $row['who_perform_assesment'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' Gestational age= '.$gestational_age.' <br> Gestational Diabetes Mellitus 
      (GDM)= '.$q2.' <br> Signs of Pre-Eclampsia= '.$q3.' <br> Vaginal Bleeding= '.$q4.' <br> Moderate Anemia (HB 7-8.9g/dl)= '
      .$q5.' <br> Severe Anemia (less than 7g/dl)= '.$q6.' <br> Discrepancy of Fundal Height 2cm or more= '.$q7.
      ' <br> Oligohydramnios / Polyhydramnios= '.$q8.' <br> Malpresentation >= 36 Weeks= '.$q9.' <br> Decrease/Loss of Fetal Movement >= 20 Weeks= '.$q10.' <br> Multiple pregnancy= '.$q11.' <br> Premature rupture membranes >= 37 Weeks= '.$q12.
      ' <br> Preterm Premature rupture membranes < 37 Weeks= '.$q13.' <br> Rh -ve with +ve indirect coomb’s test= '.$q14.' <br> Negative FHS >= 12 Weeks= '.$q15.' <br> Pregnancy with pelvic or uterine mass= '.$q16.' <br> others= '.$others.
      ' <br> who perform assesment= '.$who_perform_assesment.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
      </div>
    <?php } ?>  
  </div>    

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Medical_obsterical_risks"){?>
      <div id="form" style="width: 1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Medical & obsterical risks</legend><hr>
        <p style="color: red;">If you want to know all of your medical & obsterical risks  results, just enter your id in the search box *</p>
          <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from medical_obsterical_risks where mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $age= $row['age'];
      $Consecutive_abortions = $row['Consecutive_abortions'];
      $peri_natal_deaths = $row['peri_natal_deaths'];
      $previous_CS = $row['previous_CS'];
      $one_complicated_CS = $row['one_complicated_CS'];
      $grand_multiparty = $row['grand_multiparty'];
      $puerperal_sepsis = $row['puerperal_sepsis'];
      $gestational_hypertension = $row['gestational_hypertension'];
      $preeclampsia = $row['preeclampsia'];
      $eclampsia_seizures = $row['eclampsia_seizures'];
      $uterine_surgery = $row['uterine_surgery'];
      $previous_APH = $row['previous_APH'];
      $previous_PPH = $row['previous_PPH'];
      $gestational_diabetes_mellitus = $row['gestational_diabetes_mellitus'];
      $renal_disease = $row['renal_disease'];
      $heart_disease = $row['heart_disease'];
      $deep_vein_thrombosis = $row['deep_vein_thrombosis'];
      $previous_preterm_birth = $row['previous_preterm_birth'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' age (<16 or >40)= '.$age.' <br> Consecutive abortions= '.
      $Consecutive_abortions.' <br> peri natal deaths= '.$peri_natal_deaths.' <br> previous CS= '.$previous_CS.' <br> one complicated CS= '
      .$one_complicated_CS.' <br> grand multiparty= '.$grand_multiparty.' <br> puerperal sepsis= '.$puerperal_sepsis.
      ' <br> gestational hypertension= '.$gestational_hypertension.' <br> preeclampsia= '.$preeclampsia.' <br> eclampsia seizures= '
      .$eclampsia_seizures.' <br> uterine surgery= '.$uterine_surgery.' <br> previous APH= '.$previous_APH.
      ' <br> previous PPH= '.$previous_PPH.' <br> gestational diabetes mellitus= '.$gestational_diabetes_mellitus.' <br> renal disease= '
      .$renal_disease.' <br> heart disease= '.$heart_disease.' <br> deep vein thrombosis= '.$deep_vein_thrombosis.
      ' <br> previous preterm birth= '.$previous_preterm_birth.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
      </div>
    <?php } ?>  
  </div>  

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Newborn_Assesment"){?>
      <div id="form" style="width: 1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Newborn Assesment</legend><hr>
        <p style="color: red;">If you want to know all of your baby's assesment results, just search for his\her name or serial number in the search box *</p>
          <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from newborn_assessment where child_name like '%$searchq%' or serial_num like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $child_name = $row['child_name'];
      $child_serial_num = $row['serial_num'];
      $mode_of_delivery = $row['mode_of_delivery'];
      $date_of_birth = $row['date_of_birth'];
      $birth_weight = $row['birth_weight'];
      $gestational_age_at_delivery = $row['gestational_age_at_delivery'];
      $temperature = $row['temperature'];
      $pulse = $row['pulse'];
      $resp_rate = $row['resp._rate'];
      $weight = $row['weight'];
      $height = $row['height'];
      $head_circumference = $row['head_circumference'];
      $sex = $row['sex'];
      $congenital_malformation = $row['congenital_malformation'];
      $jaundice = $row['jaundice'];
      $cyanosis = $row['cyanosis'];
      $umbilical_stump = $row['umbilical_stump'];
      $feeding = $row['feeding'];
      $remarks = $row['remarks'];
      $doctor_name = $row['doctor_name'];
      $doctor_id = $row['doctor_id'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' <br> child serial num.= '.$child_serial_num.
      ' <br> mode of delivery= '.$mode_of_delivery.' <br> date of birth= '.$date_of_birth.' <br> bitht weight= '.$birth_weight.
      ' <br> gestational age at delivery= '.$gestational_age_at_delivery.' <br> temperature= '.$temperature.' <br> pulse= '.$pulse.
      ' <br> resp_rate= '.$resp_rate.' <br> weight= '.$weight.' <br> height= '.$height.' <br> head circumference= '.$head_circumference.
      ' <br> sex= '.$sex.' <br> congenital malformation= '.$congenital_malformation.' <br> jaundice= '.$jaundice.' <br> cyanosis= '.$cyanosis.' <br> umbilical stump= '.$umbilical_stump.' <br> feeding= '.$feeding.' <br> remarks= '.$remarks.' <br> doctor name= '.$doctor_name.' <br> doctor id= '.$doctor_id.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
      </div>
    <?php } ?>  
  </div>

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="child_followUp_referred"){?>
      <div id="form" style="width:1020px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child Follow-up & Reffered</legend><hr>
        <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">SerialNum.</td>
 <td style="border:1px solid #000;" align="center">Date</td>
 <td style="border:1px solid #000;" align="center">Problem</td>
 <td style="border:1px solid #000;" align="center">Treatment</td>
 <td style="border:1px solid #000;" align="center">Notes</td>
 <td style="border:1px solid #000;" align="center">DoctorName</td>
 <td style="border:1px solid #000;" align="center">DoctorID</td>
 </tr>
 </thead>
 <?php
  $sql="select * from child_followup_referred where mom_id='".$_SESSION["id"]."' order by child_serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=child_followup_referred&child_serial_num=<?php echo $row["child_serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['child_serial_num'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="visit_date" value="<?php echo $row['date'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="problem" value="<?php echo $row['Illness_problem'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="Treatment" value="<?php echo $row['Treatment'];?>" style="width:80px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="Notes" value="<?php echo $row['Notes'];?>" style="width:50px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="DoctorName" value="<?php echo $row['doctor_name'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="DoctorID" value="<?php echo $row['doctor_id'];?>" style="width:50px; height:25px;"/></td>      
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table><br>     
      </div>
      

    <?php }?>  
  </div>

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Child_vaccination_program"){?>      
      <div id="form" style="width:1020px;">
          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child Vaccination Program</legend><hr>

  <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from child_vaccination_program where child_name like '%$searchq%' or child_serial_num like '%$searchq%' or vaccine_name like '%$searchq%' or vaccine_date like '%$searchq%' or lot_no like '%$searchq%' or vaccinator_name like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $child_name = $row['child_name'];
      $child_serial_num = $row['child_serial_num'];
      $vaccine_name = $row['vaccine_name'];
      $vaccine_date = $row['vaccine_date'];
      $lot_no = $row['lot_no'];
      $vaccinator_name = $row['vaccinator_name'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' ,child serial num.= '.$child_serial_num.' ,vaccine name= '.$vaccine_name.' ,vaccine date= '.$vaccine_date.' ,lot. no.= '.$lot_no.' ,vaccinator name= '.$vaccinator_name.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
<hr>         
 <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">SerialNum.</td>
 <td style="border:1px solid #000;" align="center">VaccinName</td>
 <td style="border:1px solid #000;" align="center">VaccineDate</td>
 <td style="border:1px solid #000;" align="center">Lot.No.</td>
 <td style="border:1px solid #000;" align="center">VaccinatorName</td>
 </tr>
 </thead>
 <?php
  $sql="select * from child_vaccination_program where mom_id='".$_SESSION["id"]."' order by child_serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Child_vaccination_program&child_serial_num=<?php echo $row["child_serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="20px">
  <input type="text" name="serial_num" value="<?php echo $row['child_serial_num'];?>" style="width:20px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="vaccine_name" value="<?php echo $row['vaccine_name'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="120px;">
  <input type="text" name="vaccine_date" value="<?php echo $row['vaccine_date'];?>" style="width:120px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="lot_no" value="<?php echo $row['lot_no'];?>" style="width:80px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="vaccinator_name" value="<?php echo $row['vaccinator_name'];?>" style="width:50px; height:25px;"/></td>   
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table><br>          
      </div>
      <div id="form" style="width:1020px;">
          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">School Vaccination Program</legend><hr>

  <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from school_vaccination_program where child_name like '%$searchq%' or child_serial_num like '%$searchq%' or vaccine_name like '%$searchq%' or visit_date like '%$searchq%' or lot_no like '%$searchq%' or vaccinator_name like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $child_name = $row['child_name'];
      $child_serial_num = $row['child_serial_num'];
      $vaccine_name = $row['vaccine_name'];
      $visit_date = $row['visit_date'];
      $lot_no = $row['lot_no'];
      $vaccinator_name = $row['vaccinator_name'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' ,child serial num.= '.$child_serial_num.' ,vaccine name= '.$vaccine_name.' ,visit date= '.$visit_date.' ,lot. no.= '.$lot_no.' ,vaccinator name= '.$vaccinator_name.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
<hr>         
 <table border="3" cellpadding="0" cellspacing="0" width="100%" 
 style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">SerialNum.</td>
 <td style="border:1px solid #000;" align="center">VaccinName</td>
 <td style="border:1px solid #000;" align="center">Date</td>
 <td style="border:1px solid #000;" align="center">Lot.No.</td>
 <td style="border:1px solid #000;" align="center">VaccinatorName</td>
 </tr>
 </thead>
 <?php
  $sql="select * from school_vaccination_program where mom_id='".$_SESSION["id"]."' order by child_serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Child_vaccination_program&child_serial_num=<?php echo $row["child_serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['child_serial_num'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="vaccine_name" value="<?php echo $row['vaccine_name'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="visit_date" value="<?php echo $row['visit_date'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="lot_no" value="<?php echo $row['lot_no'];?>" style="width:80px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="vaccinator_name" value="<?php echo $row['vaccinator_name'];?>" style="width:50px; height:25px;"/></td>  
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table><br>         
      </div>
  </div>
<?php }?>  

  <div>
   <?php if(isset($_GET['do']) && $_GET['do']=="Child_Preventive_Examinations"){?>
          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child Preventive Examinations</legend><hr>

  <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from child_preventive_examinations where child_name like '%$searchq%' or serial_num like '%$searchq%' or examination_name like '%$searchq%' or visit_date like '%$searchq%' or mom_id like '%searchq%'") 
  or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $child_name = $row['child_name'];
      $serial_num = $row['serial_num'];
      $examination_name = $row['examination_name'];
      $visit_date = $row['visit_date'];
      $result = $row['result'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' ,child serial num.= '.$serial_num.' ,examination name= '.$examination_name.' ,visit date= '.$visit_date.' ,result= '.$result.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
<hr>          
 <table border="3" cellpadding="0" cellspacing="0" width="100%" 
 style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">SerialNum.</td>
 <td style="border:1px solid #000;" align="center">ExaminationName</td>
 <td style="border:1px solid #000;" align="center">Date</td>
 <td style="border:1px solid #000;" align="center">Result</td>
 </tr>
 </thead>
 <?php
  $sql="select * from child_preventive_examinations where mom_id='".$_SESSION["id"]."' order by serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=child_preventive_examinations&serial_num=<?php echo $row["serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;" disabled/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['serial_num'];?>" style="width:50px; height:25px;" disabled/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="examination_name" value="<?php echo $row['examination_name'];?>" style="width:50px; height:25px;" disabled/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="visit_date" value="<?php echo $row['visit_date'];?>" style="width:80px; height:25px;" disabled/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="result" value="<?php echo $row['result'];?>" style="width:80px; height:25px;" disabled/></td>   
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table>
 <br>
  </div>
<?php }?>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Previous_pregnancies"){?>

 <form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Previous Pregnancies</legend><hr>
   <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from previous_preganacies where child_name like '%$searchq%' or sex like '%$searchq%' or  date_of_birth like '%$searchq%' or serial_num like '%$searchq%' or mom_id like '%$searchq%' or gestational_age like '%$searchq%' or mode_of_delivery like '%$searchq%' or place_of_birth like '%$searchq%'") 
    or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $child_name = $row['child_name'];
      $sex = $row['sex'];
      $date_of_birth = $row['date_of_birth'];
      $serial_num = $row['serial_num'];
      $mom_id = $row['mom_id'];
      $gestational_age = $row['gestational_age'];
      $mode_of_delivery = $row['mode_of_delivery'];
      $place_of_birth = $row['place_of_birth'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' ,sex= '.$sex.' ,child id= '.$date_of_birth.' ,serial_num= '.$serial_num.' ,mom id= '.$mom_id.' gestational age= '.$gestational_age.' ,mode of delivery= '.$mode_of_delivery.' ,place of birth= '.$place_of_birth.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
<hr>     
      <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <tr>
 <td style="border:1px solid #000;" align="center">ChildSerialNum</td>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">ChildBirthDate</td>
 <td style="border:1px solid #000;" align="center">Sex</td>
 <td style="border:1px solid #000;" align="center">GestationalAge</td>
 <td style="border:1px solid #000;" align="center">ModeOfDelivery</td>
 <td style="border:1px solid #000;" align="center">PlaceOfBirth</td>
 </tr>
 
 <?php
   $sql="select * from previous_preganacies where mom_id='".$_SESSION["id"]."' order by serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Previous_pregnancies&serial_num=<?php echo $row["serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['serial_num'];?>" style="width:50px; height:25px;" disabled/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="B_Date" value="<?php echo $row['date_of_birth'];?>" style="width:100px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="100px;">
  <input type="text" name="sex" value="<?php echo $row['sex'];?>" style="width:50px; height:25px;"/></td>    
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="gestational_age" value="<?php echo $row['gestational_age'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="mode_of_delivery" value="<?php echo $row['mode_of_delivery'];?>" style="width:50px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="place_of_birth" value="<?php echo $row['place_of_birth'];?>" style="width:50px; height:25px;"/></td>       
 </form>
 </tr>
 
 <?php }while($row=$res -> fetch_assoc());?>
 
 
 </table>
 <br>
 <br>      
   </fieldset>   
</form>      
  </div>
  <br><br>
<?php }?>

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Manage_Children"){?>
 <form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">All Children</legend><hr>
   <form method="post" action="">
   <input type="text" name="search" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from child_info where child_name like '%$searchq%' or sex like '%$searchq%' or date_of_birth like '%$searchq%' or serial_num like '%$searchq%' or mom_id like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $child_name = $row['child_name'];
      $sex = $row['sex'];
      $date_of_birth = $row['date_of_birth'];
      $serial_num = $row['serial_num'];
      $mom_id = $row['mom_id'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' ,sex= '.$sex.' ,date of birth= '.$date_of_birth.' ,serial_num= '.$serial_num.' ,mom id= '.$mom_id.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
<hr>     
      <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <tr>
 <td style="border:1px solid #000;" align="center">ChildSerialNum</td>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">ChildBirthDate</td>
 <td style="border:1px solid #000;" align="center">Sex</td>
 </tr>
 
 <?php
   $sql="select * from child_info where mom_id='".$_SESSION["id"]."' order by serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Manage_Children&do2=login_child&serial_num=<?php echo $row["serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['serial_num'];?>" style="width:50px; height:25px;" disabled/></td> 
 <td  align="center" style="border:1px solid #000;" width="250px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:250px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="150px;">
  <input type="text" name="B_Date" value="<?php echo $row['date_of_birth'];?>" style="width:150px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="150px;">
  <input type="text" name="sex" value="<?php echo $row['sex'];?>" style="width:150px; height:25px;"/></td>   
 </form>
 </tr>
 
 <?php }while($row=$res -> fetch_assoc());?>
 
 
 </table>
 <br>
 <br>      
   </fieldset>   
</form>      
  </div>
  <br><br>
<?php }?>

  <div>
  <?php if(isset($_GET['do']) && $_GET['do']=="Mother_Info"){?>
      <form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Mother Information</legend><hr>
      <table>
        <?php
        $res=$config -> query("select * from mother_info where mom_id='".$_SESSION['id']."'") 
          or die($config -> error);
          $row= $res -> fetch_assoc();
          ?>
        <form action="?do=Mother_Info&do2=update&mom_id=<?php echo $row["mom_id"]; ?>" method="post">
         <tr>
            <td>Mother Name:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="mother_name" value="<?php echo $row['mother_name'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>
         <tr>
            <td>Mother BirthDay:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="mom_bdate" value="<?php echo $row['mom_bdate'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>
         <tr>
            <td>Husband Name:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="father_name" value="<?php echo $row['father_name'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>  
         <tr>
            <td>Husband id num.:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="id_num_dad" value="<?php echo $row['id_num_dad'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr> 
         <tr>
            <td>Telephone Num.:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="phone" value="<?php echo $row['phone'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr> 
         <tr>
            <td>Mother ID:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="mom_id" value="<?php echo $row['mom_id'];?>" style="width:100px; height:25px;"/>
            </td> 
         </tr>
         <tr>
            <td>Nursing / maternity center:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="maternity_center" value="<?php echo $row['maternity_center'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>   
         <tr>
            <td>Country:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="city" value="<?php echo $row['city'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr> 
         <tr>
            <td>Phone number for the health center:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="center_phone" value="<?php echo $row['center_phone'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>
         <tr>
            <td>Mother's blood type:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="mom_blood_group" value="<?php echo $row['mom_blood_group'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>  
         <tr>
            <td>The Rhesic factor:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="rh_factor" value="<?php echo $row['rh_factor'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>
         <tr><
            <td>Doctor ID:</td>
             <td  align="center" style="border:1px solid #000;" width="100px">
              <input type="text" name="doctor_id" value="<?php echo $row['doctor_id'];?>" style="width:100px; height:25px;" />
            </td> 
         </tr>  
         <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><input type="submit" name="update" value="Update"></td>
         </tr> 
         </form>                                                                                                
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["update"])){
       $sql="update mother_info set mother_name='".$_POST['mother_name']."' ,mom_bdate='".$_POST['mom_bdate']."' 
       ,father_name='".$_POST['father_name']."' ,id_num_dad='".$_POST['id_num_dad']."' ,phone='".$_POST['phone']."' 
       ,mom_id='".$_POST['mom_id']."' ,maternity_center='".$_POST['maternity_center']."' ,center_phone='".$_POST['center_phone']."' 
       ,city='".$_POST['city']."' ,mom_blood_group='".$_POST['mom_blood_group']."' ,rh_factor='".$_POST['rh_factor']."' 
       ,doctor_id='".$_POST['doctor_id']."' where mom_id='".$row['mom_id']."'";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form>
</div>
<?php }?>  

<?php } ?>
  