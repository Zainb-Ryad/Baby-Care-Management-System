<?php 

if($_SESSION['type']=="doctor"){
  ?>
   <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px; color:#404040; text-align: center;background: #F7819F;">
    <div style="float: left; text-align: center;">
      <a href="?do=Doctor_Info"  style="margin: 5px;"> Doctor Info </a>
      <a href="?do=chat"  style="margin: 5px;"> Chat </a>
      <a href="?do=Antenatal_Follow_Up" style="margin: 5px;"> Medical Examination</a>
      <a href="?do=child_examination" style="margin: 5px;"> Child Examination </a>
      <a href="?do=child_followUp_referred" style="margin: 5px;">  Child Follow-up & Referred </a>
      <a href="?do=Baby_measurements" style="margin: 5px;">  Baby Measurements </a>
      <a href="?do=Search" style="margin: 5px;">  Search </a>
      <a href="?do=Schedule" style="margin: 5px;">  Schedule </a>
    </div>   
     <br>
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
          $res=$config -> query("select name from users") or die($config -> error);
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
    <?php if(isset($_GET['do']) && $_GET['do']=="child_followUp_referred"){?>
      <?php if(isset($_GET['do2']) && $_GET['do2']=="delete_child"){
        $sql="delete from child_followup_referred where child_serial_num='".$_GET['child_serial_num']."'";
        $res=$config -> query($sql);
      }?>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child Follow-up & Referred</legend><hr>
              <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">SerialNum.</td>
 <td style="border:1px solid #000;" align="center">MomID</td>
 <td style="border:1px solid #000;" align="center">Date</td>
 <td style="border:1px solid #000;" align="center">Problem</td>
 <td style="border:1px solid #000;" align="center">Treatment</td>
 <td style="border:1px solid #000;" align="center">Notes</td>
 <td style="border:1px solid #000;" align="center">Delete</td>
 </tr>
 </thead>
 <?php
  $sql="select * from child_followup_referred where doctor_id='".$_SESSION["id"]."' order by child_serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=child_followup_referred&child_serial_num=<?php echo $row["child_serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['child_serial_num'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="mom_id" value="<?php echo $row['mom_id'];?>" style="width:50px; height:25px;"/></td>  
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="visit_date" value="<?php echo $row['date'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="problem" value="<?php echo $row['Illness_problem'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="Treatment" value="<?php echo $row['Treatment'];?>" style="width:80px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="Notes" value="<?php echo $row['Notes'];?>" style="width:50px; height:25px;"/></td> 
 <td style="border:1px solid #000;" align="center" width="100px;" class="input">
  <a href="?do=Manage_Children&do2=delete_child&child_serial_num=<?php echo $row["child_serial_num"]; ?>" style="text-decoration:none;">Delete</a></td>       
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table><br>
      <form method="post" action="" id="form" style="width:500px;">
        <fieldset>
          <table>
            <tr>
              <td>Child Name:</td>
              <td><input type="text" name="Name"></td>
            </tr>
            <tr>
              <td>Child serial num.:</td>
              <td><input type="text" name="serial_num"></td>
            </tr>
            <tr>
              <td>Mother ID:</td>
              <td><input type="text" name="serial_num"></td>
            </tr>            
            <tr>
              <td>Date:</td>
              <td><input type="Date" name="visit_date"></td>
            </tr>
            <tr>
              <td>Illness or Problem:</td>
              <td><input type="text" name="problem"></td>
            </tr>
            <tr>
              <td>Treatement or Referred:</td>
              <td><input type="text" name="treatement"></td>
            </tr>
            <tr>
              <td>Notes:</td>
              <td><input type="text" name="notes"></td>
            </tr>
            <tr>
              <td>Doctor Name:</td>
              <td><input type="text" name="doctor_name"></td>
            </tr>
            <tr>
              <td>Doctor ID:</td>
              <td><input type="text" name="doctor_id"></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><input type="submit" name="save" value="Save"></td>
            </tr>
          </table>
        </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into child_followup_referred values('".$_POST["Name"]."','".$_POST["serial_num"]."','".$_POST["mom_id"]."'
       ,'".$_POST["visit_date"]."','".$_POST["problem"]."','".$_POST["treatement"]."','".$_POST["notes"]."','".$_POST["doctor_name"]."'
       ,'".$_POST["doctor_id"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p> 
</form> 
<?php }?>  
</div> 

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Antenatal_Follow_Up"){?>
      <form method="post" action="" id="form" style="width:1000px;">
        <fieldset>
          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Medical Examination</legend><hr>
          <table>
            <tr>
              <td>Mother Name:</td>
              <td><input type="text" name="mother_name"></td>
            </tr>
            <tr>
              <td>Mother ID:</td>
              <td><input type="text" name="mom_id"></td>
            </tr>
            <tr>
              <td>Date</td>
              <td><input type="Date" name="day_date"></td>
            </tr>            
         <tr>
            <td>General:</td>
            <td>
                <input type="radio" id="normal" name="q1" value="normal">
                  <label for="normal">Normal</label>
                  <input type="radio" id="abnormal" name="q1" value="abnormal">
                  <label for="abnormal">Abnormal</label>              
            </td>
         </tr>
         <tr>
            <td>Head & Neck:</td>
            <td>
                <input type="radio" id="normal" name="q2" value="normal">
                  <label for="normal">Normal</label>
                  <input type="radio" id="abnormal" name="q2" value="abnormal">
                  <label for="abnormal">Abnormal</label>              
            </td>
         </tr>
         <tr>
            <td>Heart:</td>
            <td>
                <input type="radio" id="normal" name="q3" value="normal">
                  <label for="normal">Normal</label>
                  <input type="radio" id="abnormal" name="q3" value="abnormal">
                  <label for="abnormal">Abnormal</label>              
            </td>
         </tr>
         <tr>
            <td>Breast:</td>
            <td>
                <input type="radio" id="normal" name="q4" value="normal">
                  <label for="normal">Normal</label>
                  <input type="radio" id="abnormal" name="q4" value="abnormal">
                  <label for="abnormal">Abnormal</label>              
            </td>
         </tr>
         <tr>
            <td>Lung:</td>
            <td>
                <input type="radio" id="normal" name="q5" value="normal">
                  <label for="normal">Normal</label>
                  <input type="radio" id="abnormal" name="q5" value="abnormal">
                  <label for="abnormal">Abnormal</label>              
            </td>
         </tr>
         <tr>
            <td>Abdomen:</td>
            <td>
                <input type="radio" id="normal" name="q6" value="normal">
                  <label for="normal">Normal</label>
                  <input type="radio" id="abnormal" name="q6" value="abnormal">
                  <label for="abnormal">Abnormal</label>              
            </td>
         </tr>
         <tr>
            <td>Lower Limbs:</td>
            <td>
                <input type="radio" id="normal" name="q7" value="normal">
                  <label for="normal">Normal</label>
                  <input type="radio" id="abnormal" name="q7" value="abnormal">
                  <label for="abnormal">Abnormal</label>              
            </td>
         </tr>
         <tr>
            <td>Vaccination:</td>
            <td></td>
         </tr> 
         <tr>
          <td></td>
            <td>dt:</td>
            <td>
                <input type="radio" id="yes" name="q8" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q8" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
          <td></td>
            <td>others:</td>
            <td>
                <input type="radio" id="yes" name="q9" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q9" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
           <td></td>
           <td>If yes specify:</td>
           <td><input type="text" name="specify"></td>
         </tr>  
            <tr>
              <td>Height:</td>
              <td><input type="text" name="ht"></td>
            </tr>
            <tr>
              <td>Body Mass Index:</td>
              <td><input type="text" name="BMI"></td>
            </tr>
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><input type="submit" value="Save" name="save1"></td>
         </tr>                                                                                                               
          </table>
        </fieldset>
        <p>
      <?php if(isset($_POST["save1"])){
       $sql="insert into medical_examination values('".$_POST["mother_name"]."','".$_POST["mom_id"]."','".$_SESSION["id"]."'
       ,'".$_POST["day_date"]."','".$_POST["ht"]."','".$_POST["BMI"]."','".$_POST["q1"]."','".$_POST["q2"]."','".$_POST["q3"]."'
       ,'".$_POST["q4"]."','".$_POST["q5"]."','".$_POST["q6"]."','".$_POST["q7"]."','".$_POST["q8"]."'
       ,'".$_POST["q9"]."','".$_POST["specify"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>
      </form>
      <br><br>

      <form method="post" action="" id="form" style="width:1000px;">
        <fieldset>
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Antenatal Follow Up</legend><hr>
        <table>
        <tr>
          <td>Mother Name:</td>
          <td><input type="text" name="mother_name"></td>
        </tr>          
        <tr>
          <td>Mother ID:</td>
          <td><input type="text" name="mom_id"></td>
        </tr>
          <tr>
            <td>Date:</td>
            <td><input type="Date" name="visit_date"></td>
          </tr>
          <tr>
            <td>Blood Pressure:</td>
            <td><input type="text" name="BP"></td>
          </tr>
          <tr>
            <td>Oedema:</td>
            <td><input type="text" name="Oedema"></td>
          </tr>
          <tr>
            <td>Weight:</td>
            <td><input type="text" name="wt"></td>
          </tr>  
         <tr>
            <td>Urine Stick:</td>
            <td>
                <input type="radio" id="Alb" name="urine_stick" value="Alb">
                  <label for="Alb">Alb</label>
                  <input type="radio" id="Sug" name="urine_stick" value="Sug">
                  <label for="Sug">Sug</label>              
            </td>
         </tr>
         <tr>
            <td>Fetal Heartbeat (FHS):</td>
            <td>
                <input type="radio" id="+ve" name="FHS" value="+ve">
                  <label for="+ve">+ve</label>
                  <input type="radio" id="-ve" name="FHS" value="-ve">
                  <label for="-ve">-ve</label>              
            </td>
         </tr>
         <tr>
           <td>Gestational age :</td>
         </tr>                  
         <tr>
           <td></td>
           <td>Date:</td>
           <td><input type="text" name="gad"></td>
         </tr>
         <tr>
           <td></td>
           <td>Size/cm:</td>
           <td><input type="text" name="size/cm"></td>
         </tr> 
         <tr>
           <td>Presentation:</td>
           <td><input type="text" name="presentation"></td>
         </tr> 
         <tr>
           <td>Complaint,Management,Medication & Remarks:</td>
           <td><input type="text" name="Remarks"></td>
         </tr>
         <tr>
           <td>Supplements(iron+F.A):</td>
           <td><input type="text" name="Supplements"></td>
         </tr>
         <tr>
           <td>Next Visit:</td>
           <td><input type="Date" name="next_visit"></td>
         </tr>   
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><input type="submit" value="Save" name="save2"></td>
         </tr>                                                 
        </table>
        </fieldset>
        <p>
      <?php if(isset($_POST["save2"])){
       $sql="insert into antenatal_follow_up values('".$_POST["mother_name"]."','".$_POST["mom_id"]."','".$_POST["visit_date"]."'
       ,'".$_POST["BP"]."','".$_POST["Oedema"]."','".$_POST["wt"]."','".$_POST["urine_stick"]."','".$_POST["FHS"]."','".$_POST["gad"]."'
       ,'".$_POST["size/cm"]."','".$_POST["presentation"]."','".$_POST["Remarks"]."','".$_POST["Supplements"]."','".$_POST["next_visit"]."'
       ,'".$_SESSION["id"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>        
      </form>
  </div>
  <br><br>
<?php }?>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Schedule") { ?>
    <?php if(isset($_GET['do2']) && $_GET['do2']=="delete_mother"){
    $sql="delete from antenatal_follow_up where mom_id='".$_GET['mom_id']."'";
    $res=$config -> query($sql);
 }
 ?>
      <form method="post" action="" id="form" style="width: 1000px;">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Antenatal Follow Up</legend><hr>
                <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">MotherName</td>
 <td style="border:1px solid #000;" align="center">MotherSerialNum</td>
 <td style="border:1px solid #000;" align="center">VisitDate</td>
 <td style="border:1px solid #000;" align="center">Delete</td>
 </tr>
 </thead>
 <?php
  $sql="select * from antenatal_follow_up where doctor_id='".$_SESSION["id"]."'";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Schedule&mom_id=<?php echo $row["mom_id"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="80px">
  <input type="text" name="name" value="<?php echo $row['mother_name'];?>" style="width:80px; height:25px;" /></td> 
 <td  align="center" style="border:1px solid #000;" width="80px">
  <input type="text" name="mom_id" value="<?php echo $row['mom_id'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="next_visit" value="<?php echo $row['next_visit'];?>" style="width:80px; height:25px;"/></td>
 <td style="border:1px solid #000;" align="center" width="50px;" class="input">
  <a href="?do=Schedule&do2=delete_mother&mom_id=<?php echo $row["mom_id"]; ?>" style="text-decoration:none;">
  Delete</a></td>    
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table><br>
      </form>
    <?php } ?>
  </div>

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Baby_measurements"){?>
      <form method="post" action="" id="form" style="width: 1000px;">
        <fieldset>
          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Baby Measurements</legend><hr>
          <table>
            <tr>
              <td>Child serial num.:</td>
              <td><input type="text" name="serial_num"></td>
            </tr>
         <tr>
            <td>Sex: </td>
            <td>
                <input type="radio" id="male" name="sex" value="male">
                  <label for="male">Male</label>
                  <input type="radio" id="female" name="sex" value="female">
                  <label for="female">Female</label>
            </td>
         </tr>
            <tr>
              <td>Date:</td>
              <td><input type="Date" name="visit_date"></td>
            </tr>
            <tr>
              <td>Age (yr/mo):</td>
              <td><input type="text" name="age"></td>
            </tr>
            <tr>
              <td>Weight (kg.):</td>
              <td><input type="text" name="weight"></td>
            </tr>
            <tr>
              <td>Ht/Lt (cm.):</td>
              <td><input type="text" name="ht"></td>
            </tr>
            <tr>
              <td>HC (cm.):</td>
              <td><input type="text" name="hc"></td>
            </tr> 
            <tr>
              <td>Tonics (Vitamin A + D and Iron):</td>
              <td><input type="text" name="tonics"></td>
            </tr>
            <tr>
              <td>Remarks:</td>
              <td><input type="text" name="remarks"></td>
            </tr>
         <tr>
           <td></td>
           <td></td>
           <td></td>
            <td><input type="submit" name="save" value="Save"></td>           
         </tr>                                                                                                         
          </table>
        </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into child_measurements values('".$_POST["serial_num"]."','".$_POST["sex"]."','".$_POST["visit_date"]."',
       '".$_POST["age"]."','".$_POST["weight"]."','".$_POST["ht"]."','".$_POST["hc"]."','".$_POST["tonics"]."','".$_POST["remarks"]."'
       ,'".$_SESSION["id"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>        
   </form><br>
   <form method="post" action="">
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
          stacked:true
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
          stacked:true
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
          hideHover:'auto',
          stacked:true
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
          hideHover:'auto',
          stacked:true
        });
      </script>

   </form>
 <?php }?>
</div>


  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="child_examination"){?>
      <form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child Examination</legend><hr>
      <table>
         <tr>
            <td>Child Serial Num:</td>
            <td><input type="text" name="serial_num"></td>
         </tr>
         <tr>
            <td>Sex: </td>
            <td>
                <input type="radio" id="male" name="gender" value="male">
                  <label for="male">Male</label>
                  <input type="radio" id="female" name="gender" value="female">
                  <label for="female">Female</label>
            </td>
         </tr>
         <tr>
            <td>Age in monthes:</td>
            <td><input type="text" name="age"></td>
         </tr>
         <tr>
            <td>Date of Visit:</td>
            <td><input type="Date" name="visit_date"></td>
         </tr>
         <tr>
            <td>Is the general health condition abnormal?</td>
            <td>
                <input type="radio" id="yes" name="q1" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q1" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is the front fontanel closed (for a child aged 3 months or less)?</td>
            <td>
                <input type="radio" id="yes" name="q2" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q2" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there no reflected red light on the retina?</td>
            <td>
                <input type="radio" id="yes" name="q3" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q3" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there a Strabismus or doubt about the existence of a Strabism?</td>
            <td>
                <input type="radio" id="yes" name="q4" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q4" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is light reflection on the cornea asymmetric?</td>
            <td>
                <input type="radio" id="yes" name="q5" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q5" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is there confusion / rustling in the sounds of the heart?</td>
            <td>
                <input type="radio" id="yes" name="q6" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q6" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is the thigh artery pulse imperceptible?</td>
            <td>
                <input type="radio" id="yes" name="q7" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q7" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is there a suspicion of a tumor in the abdomen?</td>
            <td>
                <input type="radio" id="yes" name="q8" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q8" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there an enlarged liver / spleen?</td>
            <td>
                <input type="radio" id="yes" name="q9" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q9" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is there a tumor over the scrotum separate from the testicle?</td>
            <td>
                <input type="radio" id="yes" name="q10" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q10" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there a tumor inside the scrotum separate from the testicle?</td>
            <td>
                <input type="radio" id="yes" name="q11" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q11" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is the testicle imperceptible or above the scrotum?</td>
            <td>
                <input type="radio" id="yes" name="q12" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q12" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there a swollen testicle?</td>
            <td>
                <input type="radio" id="yes" name="q13" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q13" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there a hypospadias?</td>
            <td>
                <input type="radio" id="yes" name="q14" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q14" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there swelling in the groin area?</td>
            <td>
                <input type="radio" id="yes" name="q15" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q15" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is there a suspicion of a defect (dislocation) in the hip joint?</td>
            <td>
                <input type="radio" id="yes" name="q16" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q16" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Are the hips spaced limited to 75 degrees or less?</td>
            <td>
                <input type="radio" id="yes" name="q17" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q17" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is there no similarity between the dimensions of the hips?</td>
            <td>
                <input type="radio" id="yes" name="q18" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q18" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Is the spine chain abnormal?</td>
            <td>
                <input type="radio" id="yes" name="q19" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q19" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is the baby's gait abnormal (for a child walking)?</td>
            <td>
                <input type="radio" id="yes" name="q20" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q20" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Is there a tooth decay?</td>
            <td>
                <input type="radio" id="yes" name="q21" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q21" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>                                                                                                                             
         <tr>
           <td></td>
           <td></td>
           <td></td>
            <td><input type="submit" name="save" value="Save"></td>           
         </tr>                                                                  
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into child_examination values('".$_POST["serial_num"]."','".$_POST["gender"]."','".$_POST["age"]."',
       '".$_POST["visit_date"]."','".$_POST["q1"]."','".$_POST["q2"]."','".$_POST["q3"]."','".$_POST["q4"]."','".$_POST["q5"]."',
       '".$_POST["q6"]."','".$_POST["q7"]."','".$_POST["q8"]."','".$_POST["q9"]."','".$_POST["q10"]."','".$_POST["q11"]."',
       '".$_POST["q12"]."','".$_POST["q13"]."','".$_POST["q14"]."','".$_POST["q15"]."','".$_POST["q16"]."','".$_POST["q17"]."',
       '".$_POST["q18"]."','".$_POST["q19"]."','".$_POST["q20"]."','".$_POST["q21"]."','".$_SESSION["id"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form>
  <?php  }?>
  </div>

<div>
  <?php if(isset($_GET['do']) && $_GET['do']=="Doctor_Info"){?>
    <form method="post" action=""  id="form" style="width:5 00px;">      
     <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Doctor Information</legend><hr>
      <table>
         <tr>
            <td>Doctor Name:</td>
            <td><input type="text" name="Name"></td>
         </tr> 
         <tr>
            <td>Tel Number:</td>
            <td><input type="text" name="tel"></td>
         </tr>
         <tr>
            <td>Email Address : </td>
            <td><input type="Email" name="email"></td>
         </tr> 
         <tr>
            <td>City/Town:</td>
            <td><input type="text" name="city"></td>
         </tr>
         <tr>
            <td>password:</td>
            <td><input type="password" name="password"></td>
         </tr> 
         <tr>
           <td></td>
           <td></td>
           <td></td>
            <td><input type="submit" name="save" value="Save"></td>           
         </tr>                                                         
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into doctor_info values('".$_SESSION["id"]."','".$_POST["Name"]."','".$_POST["tel"]."','".$_POST["email"]."',
       '".$_POST["city"]."','".$_POST["password"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p> 
</form> 
<?php }?>  
</div>

     <div>
  <?php if(isset($_GET['do']) && $_GET['do']=="Search"){?>

      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Childs</legend><hr>
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

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' ,sex= '.$sex.' ,date of birth= '.$date_of_birth.' ,serial_num= '.$serial_num.' ,mom serial num= '.$mom_id.'</div>'; 
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
 <td style="border:1px solid #000;" align="center">MomID</td>
 <td style="border:1px solid #000;" align="center">Sex</td>
 </tr>
 
 <?php
   $sql="select * from child_info where doctor_id='".$_SESSION['id']."' order by serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Search&do2=login_child&serial_num=<?php echo $row["serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['serial_num'];?>" style="width:50px; height:25px;" disabled/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;" disabled/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="B_Date" value="<?php echo $row['date_of_birth'];?>" style="width:80px; height:25px;" disabled/></td>
   <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="mom_id" value="<?php echo $row['mom_id'];?>" style="width:50px; height:25px;" disabled/></td>
   <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="sex" value="<?php echo $row['sex'];?>" style="width:50px; height:25px;" disabled/></td>
 </form>
 </tr>
 
 <?php }while($row=$res -> fetch_assoc());?>
 
 
 </table>
 <br>
 <br>


      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Mothers</legend><hr>
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
  $query = mysqli_query($config,"select * from mother_info where mother_name like '%$searchq%' or mom_id like '%$searchq%' or mom_bdate like '%$searchq%' or rh_factor like '%$searchq%' or mom_blood_group like '%$searchq%'") or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $mother_name = $row['mother_name'];
      $mom_id = $row['mom_id'];
      $mom_bdate = $row['mom_bdate'];
      $phone = $row['phone'];
      $mom_blood_group = $row['mom_blood_group'];
      $rh_factor = $row['rh_factor'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' mother name= '.$mother_name.' ,date of birth= '.$mom_bdate.' ,phone= '.$phone.' ,mom blood group= '.$mom_blood_group.' ,Rh Factor= '.$rh_factor.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
<hr>     
      <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <tr>
 <td style="border:1px solid #000;" align="center">MomID</td>
 <td style="border:1px solid #000;" align="center">MomName</td>
 <td style="border:1px solid #000;" align="center">MomBirthDate</td>
 <td style="border:1px solid #000;" align="center">Phone</td>
 <td style="border:1px solid #000;" align="center">City</td>
 <td style="border:1px solid #000;" align="center">BloodType</td>
 <td style="border:1px solid #000;" align="center">RhFactor</td>
 </tr>
 
 <?php
   $sql="select * from mother_info where doctor_id='".$_SESSION['id']."' order by mom_id asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Search&do2=login_child&mom_id=<?php echo $row["mom_id"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="mom_id" value="<?php echo $row['mom_id'];?>" style="width:50px; height:25px;" disabled/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['mother_name'];?>" style="width:50px; height:25px;" disabled/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="B_Date" value="<?php echo $row['mom_bdate'];?>" style="width:80px; height:25px;" disabled/></td>
   <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="phone" value="<?php echo $row['phone'];?>" style="width:50px; height:25px;" disabled/></td>
   <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="city" value="<?php echo $row['city'];?>" style="width:50px; height:25px;" disabled/></td>  
   <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="bloodtype" value="<?php echo $row['mom_blood_group'];?>" style="width:50px; height:25px;" disabled/></td>
   <td  align="center" style="border:1px solid #000;" width="5px;">
  <input type="text" name="rhfactor" value="<?php echo $row['rh_factor'];?>" style="width:50px; height:25px;" disabled/></td>  
 </form>
 </tr>
 
 <?php }while($row=$res -> fetch_assoc());?>
 
 
 </table>
 <br>
 <br>


          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child Preventive Examinations</legend><hr>

  <form method="post" action="">
   <input type="text" name="search3" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search3'])) {
  $searchq = $_POST['search3'];
  $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
  $query = mysqli_query($config,"select * from child_preventive_examinations where child_name like '%$searchq%' or serial_num like '%$searchq%' or examination_name like '%$searchq%' or visit_date like '%$searchq%'") 
  or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $child_name = $row['child_name'];
      $child_serial_num = $row['serial_num'];
      $examination_name = $row['examination_name'];
      $visit_date = $row['visit_date'];
      $result = $row['result'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' child name= '.$child_name.' ,child serial num.= '.$child_serial_num.' ,examination name= '.$examination_name.' ,visit date= '.$visit_date.' ,result= '.$result.'</div>'; 
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
  $sql="select * from child_preventive_examinations order by serial_num asc";
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
 <br><br>

           <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Child Vaccination Program</legend><hr>

  <form method="post" action="">
   <input type="text" name="search4" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search4'])) {
  $searchq = $_POST['search4'];
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
  $sql="select * from child_vaccination_program order by child_serial_num asc";
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
  <input type="text" name="vaccine_date" value="<?php echo $row['vaccine_date'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="lot_no" value="<?php echo $row['lot_no'];?>" style="width:80px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="vaccinator_name" value="<?php echo $row['vaccinator_name'];?>" style="width:50px; height:25px;"/></td>   
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table>
 <br><br>

           <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">School Vaccination Program</legend><hr>

  <form method="post" action="">
   <input type="text" name="search5" placeholder="search...">
   <input type="submit"  value=">>">
 </form>
 <br>
 <?php
 $output='';
 if (isset($_POST['search5'])) {
  $searchq = $_POST['search5'];
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
  $sql="select * from school_vaccination_program order by child_serial_num asc";
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

 </table>
<br><br>
<?php }?>  
</div>
<?php } ?>
  