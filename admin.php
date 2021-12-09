<?php 

if($_SESSION['type']=="admin"){
  ?>
  
   <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px; color:#404040; text-align: center;background: #F7819F;">
    <div style="float: left; text-align: center;">
      <a href="?do=Admin_Info"  style="margin: 5px;"> Admin Info </a>
      <a href="?do=Manage_Users" style="margin: 5px;">  Manage Users </a>
      <a href="?do=chat" style="margin: 5px;">  Chat </a>
      <a href="?do=create_ads" style="margin: 5px;">  Create Ads </a>
      <a href="?do=Manage_Children" style="margin-right: 5px;">Manage Children</a>      
      <a href="?do=Newborn_Assesment" style="margin: 5px;">  Newborn Assesment </a>      
      <a href="?do=Child_Preventive_Examinations" style="margin: 5px;">  Child Preventive Examinations </a>
      <a href="?do=Child_vaccination_program" style="margin: 5px;">Child Vaccination Program</a> 
      <a href="?do=child_followUp_referred" style="margin: 5px;">  Child Follow-up & Referred </a>           
    </div>   
     <br>
  </div>

   <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Mothers Info</legend>
   <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px; color:#404040; text-align: center;background: #F7819F;">
    <div style="float: left; text-align: center;">
      <a href="?do=Mother_Info"  style="margin: 5px;"> Mother Info </a>
      <a href="?do=Previous_pregnancies"  style="margin: 5px;"> Previous Pregnancies </a>
      <a href="?do=Medical_obsterical_risks"  style="margin: 5px;"> Medical & Obsterical History Risks </a>
      <a href="?do=current_pregnancy_risks"  style="margin: 5px;"> Current Pregnancy Risks </a>
      <a href="?do=uss_examination" style="margin: 5px;"> USS Examination</a>
      <a href="?do=Postnatal_Examination" style="margin-right: 5px;">Postnatal Examination</a>
      <a href="?do=Family_Planning" style="margin-right: 5px;">Family Planning</a>
    </div>   
     <br>
  </div>

  <div>
  <?php if(isset($_GET['do']) && $_GET['do']=="Mother_Info"){?>
      <form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Mother Information</legend><hr>
      <table>
         <tr>
            <td>Mother Name:</td>
            <td><input type="text" name="mom_name"></td>
         </tr>
         <tr>
           <td>Mother ID:</td>
           <td><input type="text" name="mom_id"></td>
         </tr>        
         <tr>
            <td>Mother’s Birth Date:</td>
            <td><input type="Date" name="mom_bdate"></td>
         </tr>
         <tr>
            <td>Husband Name:</td>
            <td><input type="text" name="dad_name"></td>
         </tr>  
         <tr>
            <td>Husband’s ID Number:</td>
            <td><input type="text" name="dad_id"></td>
         </tr> 
         <tr>
            <td>Telephone Number:</td>
            <td><input type="text" name="tel"></td>
         </tr> 
         <tr>
            <td>Nursing / maternity center:</td>
            <td><input type="text" name="maternity_center"></td>
         </tr>   
         <tr>
            <td>Country:</td>
            <td><input type="text" name="country"></td>
         </tr> 
         <tr>
            <td>Phone number for the health center:</td>
            <td><input type="text" name="center_phone"></td>
         </tr>
         <tr>
            <td>Mother's blood type:</td>
            <td><input type="text" name="blood_type"></td>
         </tr>  
         <tr>
            <td>The Rhesic factor:</td>
            <td><input type="text" name="Rh"></td>
         </tr>
         <tr>
            <td>Doctor ID:</td>
            <td><input type="text" name="doctor_id"></td>
         </tr>  
         <div style="float: right;margin-top: 500px;">
           <input type="submit" name="save" value="Save">
         </div>                                                                                                 
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into mother_info values('".$_POST["mom_name"]."','".$_POST["mom_bdate"]."',
       '".$_POST["dad_name"]."','".$_POST["dad_id"]."','".$_POST["tel"]."','".$_POST["mom_id"]."','".$_POST["maternity_center"]."',
       '".$_POST["center_phone"]."','".$_POST["country"]."','".$_POST["blood_type"]."','".$_POST["Rh"]."','".$_POST["doctor_id"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form>
</div>
<?php }?>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="create_ads"){?>
      <?php if(isset($_GET['do2']) && $_GET['do2']=="delete_ad"){
        $sql="delete from create_ads where id='".$_GET['id']."'";
        $res=$config -> query($sql);
      }?>
      <form method="post" action="">
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Create Ads</legend><hr>

      <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <tr>
 <td style="border:1px solid #000;" align="center">AdID</td>
 <td style="border:1px solid #000;" align="center">AdText</td>
 <td style="border:1px solid #000;" align="center">Delete</td>

 </tr>
 
 <?php
   $sql="select * from create_ads order by id asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=create_ads&id=<?php echo $row["id"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="25px">
  <input type="text" name="id" value="<?php echo $row['id'];?>" style="width:25px; height:25px;" disabled/></td> 
 <td style="border:1px solid #000;" width="80px">
  <input type="text" name="adtext" value="<?php echo $row['ad'];?>" style="width:500px; height:25px;" disabled/></td>    
 <td style="border:1px solid #000;" align="center" width="30px;" class="input">
  <a href="?do=create_ads&do2=delete_ad&id=<?php echo $row["id"]; ?>" style="text-decoration:none;">Delete</a></td>
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>
 </table><br><br>

        <div style="display: flex;">
          <div>
            Ad Text: <input type="text" name="ads">
            <input type="submit" name="create" value="Create Ad">
          
          <?php if(isset($_POST["create"])){
            $sql="insert into create_ads values(NULL,'".$_POST["ads"]."')";
            $res=$config -> query($sql)or die($config -> error);
          }?>
        </div>
        <div style="padding:20px; margin:20px; border: solid 3px #BDBDBD; font-size:14px; color:#404040;background: #F7819F;">
          <?php
          $res=$config -> query("select * from create_ads order by id") or die($config -> error);
          while($row= $res -> fetch_assoc()){
            echo $row['id'].". ".$row['ad']."<br>";
          }
          ?>
        </div>
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
    <?php if (isset($_GET['do']) && $_GET['do']=="Previous_pregnancies"){?>
<form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Previous Pregnancies (including miscarriages)</legend><hr>    
      <table>
        <tr>
          <td>Mother ID:</td>
          <td><input type="text" name="mom_id"></td>
        </tr>
         <tr>
            <td>Child Name: </td>
            <td><input type="text" name="name"></td>
         </tr>        
         <tr>
            <td>Child Serial Num.: </td>
            <td><input type="text" name="serial_num"></td>
         </tr>         
         <tr>
            <td>Date Of Birth: </td>
            <td><input type="Date" name="bdate"></td>
         </tr>
         <tr>
            <td>Gestational age: </td>
            <td><input type="text" name="GAge"></td>
         </tr>   
         <tr>
            <td>Mode of delivery: </td>
            <td><select name="mode_of_delivery">
               <option value=Vaginal  selected>Vaginal</option>
                 <option value=C.S >C.S</option>
            </select></td>
         </tr> 
         <tr>
            <td>Place of Birth: </td>
            <td><input type="text" name="city"></td>
         </tr>   
         <tr>
            <td>Obstetric & Postnatal Complications of Previous Pregnancy: </td>
            <td><input type="text" name="Complications"></td>
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
            <td>Birth Weight in gr.: </td>
            <td><input type="text" name="wt"></td>
         </tr>   
         <tr>
            <td>Birth Outcome: </td>
            <td><input type="text" name="boutcome"></td>
            <td align="center"><input type="submit" name="save" value="Save" style="margin-left: 100px;" /></td>
         </tr>                                                                      
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into previous_preganacies values('".$_POST["mom_id"]."','".$_POST["name"]."','".$_POST["serial_num"]."'
       ,'".$_POST["bdate"]."','".$_POST["GAge"]."','".$_POST["mode_of_delivery"]."','".$_POST["city"]."','".$_POST["Complications"]."'
       ,'".$_POST["gender"]."','".$_POST["wt"]."','".$_POST["boutcome"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form>
  </div>
<?php }?>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Medical_obsterical_risks"){?>
<form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Risks Related to Medical & Obsterical History (on booking)</legend>
      <hr>
      <table>  
      <p>Mother ID:<input type="text" name="mom_id"></p>  
      <p>Date of test:<input type="Date" name="date_of_test"></p>   
         <tr>
            <td>Age <16 , >40 year:</td>
            <td>
                <input type="radio" id="yes" name="q1" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q1" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Consecutive Abortions (>=2) less than 24 week:</td>
            <td>
                <input type="radio" id="yes" name="q2" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q2" value="no">
                  <label for="no">No</label>              
            </td>            
         </tr>
         <tr>
            <td>Peri-Natal Deaths(>=1):</td>
            <td>
                <input type="radio" id="yes" name="q3" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q3" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Previous C-Section(>=2):</td>
            <td>
                <input type="radio" id="yes" name="q4" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q4" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>One Complicated C-Section:</td>
            <td>
                <input type="radio" id="yes" name="q5" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q5" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>   
         <tr>
            <td>Grand Multiparty(>=6):</td>
            <td>
                <input type="radio" id="yes" name="q6" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q6" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Puerperal Sepsis:</td>
            <td>
                <input type="radio" id="yes" name="q7" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q7" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Gestational Hypertension:</td>
            <td>
                <input type="radio" id="yes" name="q8" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q8" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Preeclampsia:</td>
            <td>
                <input type="radio" id="yes" name="q9" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q9" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>(Eclampsia) Seizures:</td>
            <td>
                <input type="radio" id="yes" name="q10" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q10" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>  
         <tr>
            <td>Uterine Surgery Except C-Section:</td>
            <td>
                <input type="radio" id="yes" name="q11" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q11" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Previous APH:</td>
            <td>
                <input type="radio" id="yes" name="q12" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q12" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>   
         <tr>
            <td>Previous PPH:</td>
            <td>
                <input type="radio" id="yes" name="q13" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q13" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Gestational Diabetes Mellitus:</td>
            <td>
                <input type="radio" id="yes" name="q14" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q14" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Renal Disease:</td>
            <td>
                <input type="radio" id="yes" name="q15" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q15" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <tr>
            <td>Heart Disease:</td>
            <td>
                <input type="radio" id="yes" name="q16" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q16" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>  
         <tr>
            <td>Deep Vein Thrombosis:</td>
            <td>
                <input type="radio" id="yes" name="q17" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q17" value="no">
                  <label for="no">No</label>              
            </td>
         </tr>
         <tr>
            <td>Previous Preterm Birth:</td>
            <td>
                <input type="radio" id="yes" name="q18" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q18" value="no">
                  <label for="no">No</label>              
            </td>
         </tr> 
         <div style="float: right;margin-top: 450px;margin-right: 150px;">
           <input type="submit" name="save" value="Save">
         </div>                                                                                                                            
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into medical_obsterical_risks values('".$_POST["mom_id"]."','".$_POST["date_of_test"]."','".$_POST["q1"]."'
       ,'".$_POST["q2"]."','".$_POST["q3"]."','".$_POST["q4"]."','".$_POST["q5"]."','".$_POST["q6"]."','".$_POST["q7"]."'
       ,'".$_POST["q8"]."','".$_POST["q9"]."','".$_POST["q10"]."','".$_POST["q11"]."','".$_POST["q12"]."','".$_POST["q13"]."'
       ,'".$_POST["q14"]."','".$_POST["q15"]."','".$_POST["q16"]."','".$_POST["q17"]."','".$_POST["q18"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form>
    <?php }?>  
  </div>  

<div>
  <?php if (isset($_GET['do']) && $_GET['do']=="current_pregnancy_risks"){?>
    <form method="post" action="" id="form" style="width:1000px;">
      <fieldset>
        <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Risks Related to Current Pregnancy</legend><hr>
        <table>
          <p>Mother ID:<input type="text" name="mom_id"></p>
          <tr>
            <td>Date of visit:</td>
            <td><input type="Date" name="visit_date"></td>
          </tr>
          <tr>
            <td>Gestational age:</td>
            <td><select name="q1">
               <option value="16 Weeks"  selected>16 Weeks</option>
                 <option value="18-22 Weeks" >18-22 Weeks</option>
                 <option value="24-28 Weeks" >24-28 Weeks</option>
                 <option value="32 Weeks" >32 Weeks</option>
                 <option value="36 Weeks" >36 Weeks</option>
            </select></td>
          </tr>
          <tr>
            <td>Gestational Diabetes Mellitus (GDM):</td>
            <td><input type="text" name="q2"></td>
          </tr> 
          <tr>
            <td>Signs of Pre-Eclampsia:</td>
            <td><input type="text" name="q3"></td>
          </tr> 
          <tr>
            <td>Vaginal Bleeding:</td>
            <td><input type="text" name="q4"></td>
          </tr> 
          <tr>
            <td>Moderate Anemia (HB 7-8.9g/dl):</td>
            <td><input type="text" name="q5"></td>
          </tr>
          <tr>
            <td>Severe Anemia (less than 7g/dl):</td>
            <td><input type="text" name="q6"></td>
          </tr>
          <tr>
            <td>Discrepancy of Fundal Height 2cm or more:</td>
            <td><input type="text" name="q7"></td>
          </tr>
          <tr>
            <td>Oligohydramnios / Polyhydramnios:</td>
            <td><input type="text" name="q8"></td>
          </tr> 
          <tr>
            <td>Malpresentation >= 36 Weeks:</td>
            <td><input type="text" name="q9"></td>
          </tr>
          <tr>
            <td>Decrease/Loss of Fetal Movement >= 20 Weeks:</td>
            <td><input type="text" name="q10"></td>
          </tr>
          <tr>
            <td>Multiple pregnancy:</td>
            <td><input type="text" name="q11"></td>
          </tr> 
          <tr>
            <td>Premature rupture membranes >= 37 Weeks:</td>
            <td><input type="text" name="q12"></td>
          </tr>
          <tr>
            <td>Preterm Premature rupture membranes < 37 Weeks:</td>
            <td><input type="text" name="q13"></td>
          </tr> 
          <tr>
            <td>Rh -ve with +ve indirect coomb’s test:</td>
            <td><input type="text" name="q14"></td>
          </tr>
          <tr>
            <td>Negative FHS >= 12 Weeks:</td>
            <td><input type="text" name="q15"></td>
          </tr>  
          <tr>
            <td>Pregnancy with pelvic or uterine mass:</td>
            <td><input type="text" name="q16"></td>
          </tr>
          <tr>
            <td>Others</td>
            <td><input type="text" name="q17"></td>
          </tr>
          <tr>
            <td>Name who perform the assesment:</td>
            <td><input type="text" name="q18"></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" name="save" value="Save"></td>
          </tr>
        </table>
      </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into current_risks values('".$_POST["mom_id"]."','".$_POST["visit_date"]."','".$_POST["q1"]."'
       ,'".$_POST["q2"]."','".$_POST["q3"]."','".$_POST["q4"]."','".$_POST["q5"]."','".$_POST["q6"]."','".$_POST["q7"]."'
       ,'".$_POST["q8"]."','".$_POST["q9"]."','".$_POST["q10"]."','".$_POST["q11"]."','".$_POST["q12"]."','".$_POST["q13"]."'
       ,'".$_POST["q14"]."','".$_POST["q15"]."','".$_POST["q16"]."','".$_POST["q17"]."','".$_POST["q18"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>                  
    </form>
</div>
<?php }?>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="uss_examination"){?>     
<form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">U/S</legend><hr>
      <table>
        <tr>
          <p>Mother ID:<input type="text" name="mom_id"></p>
        </tr>            
         <tr>
            <td>Gravida:</td>
            <td><input type="text" name="Gravida"></td>        
         </tr>
         <tr>
            <td>Parity:</td>
            <td><input type="text" name="Parity"></td>        
         </tr>
         <tr>
            <td>Abortions:</td>
            <td><input type="text" name="Abortions"></td>          
         </tr> 
         <tr>
            <td>LMP:</td>
            <td><input type="Date" name="LMP"></td>         
         </tr> 
         <tr>
            <td>EDD:</td>
            <td><input type="Date" name="EDD"></td>         
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><input type="submit" value="Save" name="save"></td>
         </tr>                                                   
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into u_s values('".$_POST["mom_id"]."','".$_POST["Gravida"]."','".$_POST["Parity"]."'
       ,'".$_POST["Abortions"]."','".$_POST["LMP"]."','".$_POST["EDD"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>
</form>      
    <form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Antenatal Ultrasound Scan Examination</legend><hr>
      <table> 
        <tr>
          <p>Mother ID:<input type="text" name="mom_id"></p>
        </tr>             
         <tr>
            <td>Date:</td>
            <td><input type="Date" name="q1"></td>
            <td>Gestation (WK) :</td>
            <td><input type="text" name="q2"></td>
         </tr>
         <tr>
            <td>No. of Fetuses:</td>
            <td><input type="text" name="q3"></td>
            <td>Heart Activity:</td>
            <td><input type="text" name="q4"></td>
         </tr>
         <tr>
            <td>Placenta:</td>
            <td><input type="text" name="q5"></td>
            <td>Presentation:</td>
            <td><input type="text" name="q6"></td>
         </tr>
         <tr>
            <td>Fetal Sex:</td>
            <td><input type="text" name="q7"></td>
            <td>Liquor Quantity:</td>
            <td><input type="text" name="q8"></td>
         </tr> 
         <tr>
            <td>Liquor Deep pocket:</td>
            <td><input type="text" name="q9"></td>
            <td>Amniotic fluid index (AFI):</td>
            <td><input type="text" name="q10"></td>
         </tr>
         <tr>
            <td>Gestational Sac (GS):</td>
            <td><input type="text" name="q11"></td>
            <td>Crown Rump Length (CRL):</td>
            <td><input type="text" name="q12"></td>
         </tr> 
         <tr>
            <td>Biparietal diameter (BPD):</td>
            <td><input type="text" name="q13"></td>
            <td>Femur length (FL):</td>
            <td><input type="text" name="q14"></td>
         </tr>
         <tr>
            <td>Abdominal circumference (AC):</td>
            <td><input type="text" name="q15"></td>
            <td>Estimated Gestational Age (EGA):</td>
            <td><input type="text" name="q16"></td>
         </tr>
         <tr>
            <td>Calculating estimated fetal weight (EFW):</td>
            <td><input type="text" name="q17"></td>
            <td>Estimated Due Date (EDD):</td>
            <td><input type="text" name="q18"></td>
         </tr>  
         <tr>
            <td>Congenital anomalies:</td>
            <td><input type="text" name="q19"></td>
            <td>suspected large for geatational age fetus:</td>
            <td><input type="text" name="q20"></td>
         </tr> 
         <tr>
            <td>suspected small for geatational age fetus:</td>
            <td><input type="text" name="q21"></td>
            <td>suspected intrauterine growth restriction:</td>
            <td><input type="text" name="q22"></td>
         </tr>
         <tr>
            <td>Doctor Name:</td>
            <td><input type="text" name="q23"></td>
            <td>Doctor ID:</td>
            <td><input type="text" name="q24"></td>
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
       $sql="insert into uss_examination values('".$_POST["mom_id"]."','".$_POST["q1"]."'
       ,'".$_POST["q2"]."','".$_POST["q3"]."','".$_POST["q4"]."','".$_POST["q5"]."','".$_POST["q6"]."','".$_POST["q7"]."'
       ,'".$_POST["q8"]."','".$_POST["q9"]."','".$_POST["q10"]."','".$_POST["q11"]."','".$_POST["q12"]."','".$_POST["q13"]."'
       ,'".$_POST["q14"]."','".$_POST["q15"]."','".$_POST["q16"]."','".$_POST["q17"]."','".$_POST["q18"]."','".$_POST["q19"]."'
       ,'".$_POST["q20"]."','".$_POST["q21"]."','".$_POST["q22"]."','".$_POST["q23"]."','".$_POST["q24"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>    
</form> 

<form action="" method="post" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Lab Test</legend><hr>
      <table>
        <tr>
          <p>Mother ID:<input type="text" name="mom_id"></p>
          <p>Date: <input type="Date" name="visit_date"></p>
        </tr>        
        <tr>
          <td>Tests</td>
          <td>Results</td>
        </tr>
         <tr>
            <td>Blood Group:</td>
            <td><input type="text" name="result1"></td>
            <td></td>
            <td></td>
         </tr>
         <tr>
            <td>Rh Typing:</td>
            <td><input type="text" name="result2"></td>
         </tr>
         <tr>
            <td>Indirect Comb’s:</td>
            <td><input type="text" name="result3"></td>
         </tr> 
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><input type="submit" value="Save" name="save3"></td>
         </tr>                 
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save3"])){
       $sql="insert into lab_test values('".$_POST["mom_sid"]."','".$_POST["visit_date"]."','".$_POST["result1"]."'
       ,'".$_POST["result2"]."','".$_POST["result3"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form> 
<form action="" method="post" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Complete Blood Count</legend><hr>
      <table>
        <tr>
          <p>Mother ID:<input type="text" name="mom_id"></p>
        </tr>        
        <tr>
          <p>Date<input type="Date" name="visit_date"></p>
        </tr>
        <tr>
          <td>CBC</td>
          <td>Results</td>
        </tr>
         <tr>
            <td>White Blood Cell</td>
            <td><input type="text" name="result1"></td>
         </tr>
         <tr>
            <td>Hemoglobin</td>
            <td><input type="text" name="result2"></td>
         </tr>
         <tr>
            <td>Hematocrit</td>
            <td><input type="text" name="result3"></td>
         </tr>
         <tr>
            <td>Mean Corpuscular Volume</td>
            <td><input type="text" name="result4"></td>
         </tr>
         <tr>
            <td>Platelets</td>
            <td><input type="text" name="result5"></td>
         </tr>
         <tr>
            <td>Fasting Blood Sugar</td>
            <td><input type="text" name="result6"></td>
         </tr> 
         <tr>
            <td>Random Blood Sugar</td>
            <td><input type="text" name="result7"></td>
         </tr> 
         <tr>
            <td>Glucose Tolerance Test (GCT)</td>
            <td><input type="text" name="result8"></td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><input type="submit" value="Save" name="save4"></td>
         </tr>                                  
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save4"])){
       $sql="insert into cbc values('".$_POST["mom_id"]."','".$_POST["visit_date"]."','".$_POST["result1"]."'
       ,'".$_POST["result2"]."','".$_POST["result3"]."','".$_POST["result4"]."','".$_POST["result5"]."','".$_POST["result6"]."'
       ,'".$_POST["result7"]."','".$_POST["result8"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form>         
    <?php }?>  
  </div>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Postnatal_Examination"){?>
      <form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Postnatal Examination</legend><hr>
      <table>
        <tr>
          <td>Mother ID:</td>
          <td><input type="text" name="mom_id"></td>
        </tr>
         <tr>
            <td>Postnatal Assesment:</td>
            <td><input type="text" name="q1"></td>
         </tr>
         <tr>
            <td>Date of Visit:</td>
            <td><input type="Date" name="q2"></td>
         </tr>
         <tr>
            <td>Days After Delivery:</td>
            <td><input type="text" name="q3"></td>
         </tr>          
         <tr>
            <td>Temperature in C.:</td>
            <td><input type="text" name="q4"></td>
         </tr>   
         <tr>
            <td>Pulse (/min):</td>
            <td><input type="text" name="q5"></td>
         </tr> 
         <tr>
            <td>Blood Pressure in mmHg:</td>
            <td><input type="text" name="q6"></td>
         </tr> 
         <tr>
            <td>Bleeding After Delivery:</td>
            <td>
                <input type="radio" id="yes" name="q7" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q7" value="no">
                  <label for="no">No</label>              
            </td>            
         </tr>  
         <tr>
            <td>Hemoglobin (Hb):</td>
            <td><input type="text" name="q8"></td>
         </tr>  
         <tr>
            <td>Deep Vein Thrombosis:</td>
            <td>
                <input type="radio" id="yes" name="q9" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q9" value="no">
                  <label for="no">No</label>              
            </td>            
         </tr> 
         <tr>
            <td>Rupture Uterus:</td>
            <td>
                <input type="radio" id="yes" name="q10" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q10" value="no">
                  <label for="no">No</label>              
            </td>            
         </tr> 
         <tr>
           <td></td>
           <td>if yes select:
            <select name="if_yes">
             <option value=Repaired  selected>Repaired</option>
             <option value=Hysterectomy_done >Hysterectomy done</option>
            </select>
           </td>
         </tr> 
         <tr>
            <td>Lochia (colour): </td>
            <td><select name="q11">
               <option value=White  selected>White</option>
                 <option value=Yellow >Yellow</option>
                 <option value="Red"  >Red</option>
            </select></td>
         </tr>  
         <tr>
            <td>Incision C.S/Episiotomy: </td>
            <td><select name="q12">
               <option value=Clean  selected>Clean</option>
                 <option value=Infected >Infected</option>
            </select></td>
         </tr>
            <td>Seizures (during pregnancy & up to 10 days after delivery):</td>
            <td>
                <input type="radio" id="yes" name="q13" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q13" value="no">
                  <label for="no">No</label>              
            </td>            
         </tr>
            <td>Blood Transfusion:</td>
            <td>
                <input type="radio" id="yes" name="q14" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q14" value="no">
                  <label for="no">No</label>              
            </td>            
         </tr> 
         <tr>
            <td>Breasts: </td>
            <td><select name="q15">
               <option value=؛Pain selected>Pain</option>
                 <option value=Redness >Redness</option>
                 <option value=Hot_Feel >Hot Feel</option>
                 <option value=Abnormal_secretions >Abnormal secretions</option>
            </select></td>
         </tr>
         <tr>
            <td>Fundal Height (cm.):</td>
            <td><input type="text" name="q16"></td>
         </tr>
         <tr>
            <td>Family Planning Counseling:</td>
            <td><input type="text" name="q17"></td>
         </tr>
         <tr>
            <td>Family Planning Appointment:</td>
            <td><input type="Date" name="q18"></td>
         </tr>
         <tr>
            <td>Recomendationd:</td>
            <td><input type="text" name="q19"></td>
         </tr>  
         <tr>
            <td>Remarks:</td>
            <td><input type="text" name="q20"></td>
         </tr>
         <tr>
           <td>Doctor Name:</td>
           <td><input type="text" name="q21"></td>
         </tr>
         <tr>
           <td>Doctor ID:</td>
           <td><input type="text" name="q22"></td>
         </tr>             
         <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><input type="submit" value="Save" name="save"></td>
         </tr>
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into postnatal_examination values('".$_POST["mom_id"]."','".$_POST["q1"]."'
       ,'".$_POST["q2"]."','".$_POST["q3"]."','".$_POST["q4"]."','".$_POST["q5"]."','".$_POST["q6"]."','".$_POST["q7"]."'
       ,'".$_POST["q8"]."','".$_POST["q9"]."','".$_POST["q10"]."','".$_POST["if_yes"]."','".$_POST["q11"]."','".$_POST["q12"]."'
       ,'".$_POST["q13"]."','".$_POST["q14"]."','".$_POST["q15"]."','".$_POST["q16"]."','".$_POST["q17"]."','".$_POST["q18"]."'
       ,'".$_POST["q19"]."','".$_POST["q20"]."','".$_POST["q21"]."','".$_POST["q22"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>   
</form>
  </div>
<?php }?>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Family_Planning"){?>
      <form method="post" action="" id="form" style="width: 1000px;">
        <fieldset>
          <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Family Planning</legend><hr>
          <table>
            <tr>
              <td>Mother ID:</td>
              <td><input type="text" name="mom_id"></td>
            </tr>
            <tr>
             <td>Do you want to use family planning methods now?</td>
             <td>
                <input type="radio" id="yes" name="q1" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q1" value="no">
                  <label for="no">No</label>           
             </td>              
            </tr>
            <tr>
             <td>Have you ever used family planning methods?</td>
             <td>
                <input type="radio" id="yes" name="q2" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q2" value="no">
                  <label for="no">No</label>           
             </td>              
            </tr> 
            <tr>
              <td>What is the method that you used for family planning?</td>
            </tr>
            <tr>
              <td></td>
            <td><select name="family_planning_method">
               <option value=Grain  selected>Grain</option>
               <option value=IUD >IUD</option>
               <option value=Suppositories >Suppositories</option>
               <option value=condom >condom</option>
               <option value=Injection >Injection</option>
               <option value="Exclusive breastfeeding for up to six months with menopause" >Exclusive breastfeeding for up to six months with menopause</option>
            </select></td>
              <td>Was it successful?
                <input type="radio" id="yes" name="q3" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="q3" value="no">
                  <label for="no">No</label>           
              </td>              
            </tr>      
            <tr>
              <td></td>
              <td>Others</td>
              <td><input type="text" name="q4"></td>
            </tr>   
            <tr>
              <td>What is the chosen method?</td>
              <td><input type="text" name="q5"></td>
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
       $sql="insert into family_planning values('".$_POST["mom_id"]."','".$_POST["q1"]."'
       ,'".$_POST["q2"]."','".$_POST["family_planning_method"]."','".$_POST["q3"]."','".$_POST["q4"]."','".$_POST["q5"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>        
      </form>
  </div>
<?php }?>    

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Manage_Children"){?>
        <?php if(isset($_GET['do2']) && $_GET['do2']=="delete_child"){
  $sql="delete from child_info where serial_num='".$_GET['serial_num']."'";
  $res=$config -> query($sql);
 }
 ?>

 <form method="post" action="" id="form" style="width:1000px;">
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Add Child</legend><hr>
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
  $query = mysqli_query($config,"select * from child_info where child_name like '%$searchq%' or date_of_birth like '%$searchq%' or serial_num like '%$searchq%' or mom_id like '%$searchq%'") or die("could not search!");
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
 <td style="border:1px solid #000;" align="center">Sex</td>
 <td style="border:1px solid #000;" align="center">ChildBirthDate</td>
 <td style="border:1px solid #000;" align="center">MomID</td>
 <td style="border:1px solid #000;" align="center">Delete</td>
 </tr>
 
 <?php
   $sql="select * from child_info order by serial_num asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr> <form action="?do=Manage_Children&do2=login_child&serial_num=<?php echo $row["serial_num"]; ?>" method="post">
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="serial_num" value="<?php echo $row['serial_num'];?>" style="width:50px; height:25px;" disabled/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="name" value="<?php echo $row['child_name'];?>" style="width:50px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="sex" value="<?php echo $row['sex'];?>" style="width:50px; height:25px;"/></td>  
 <td  align="center" style="border:1px solid #000;" width="100px;">
  <input type="text" name="B_Date" value="<?php echo $row['date_of_birth'];?>" style="width:100px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="mom_id" value="<?php echo $row['mom_id'];?>" style="width:50px; height:25px;"/></td>  
 <td style="border:1px solid #000;" align="center" width="100px;" class="input">
  <a href="?do=Manage_Children&do2=delete_child&serial_num=<?php echo $row["serial_num"]; ?>" style="text-decoration:none;">Delete</a></td>
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?> 
 </table>
 <br>
 <br>
      <table>
        <tr>
          <td>Mom ID:</td>
          <td><input type="text" name="mom_id"></td>
        </tr>
         <tr>
            <td>child’s Name:</td>
            <td><input type="text" name="name"></td>
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
            <td>child’s Birth Date:</td>
            <td><input type="Date" name="bdate"></td>
         </tr> 
         <tr>
           <td>Doctor ID:</td>
           <td><input type="text" name="doctor_id"></td>
         </tr>                                                                                       
      </table>
          <p class="submit" style="float:left">
            <input type="submit" name="addchild" value="Add Child">
      </p><br>      
        <p>
      <?php if(isset($_POST["addchild"])){
       $sql="insert into child_info values('".$_POST['name']."','".$_POST['gender']."','".$_POST['bdate']."',NULL,'".$_POST['mom_id']."'
       , '".$_POST['doctor_id']."')";
        $res1=$config -> query($sql)or die($config -> error);
      }
     ?></p>    
</form>      
  <br><br>
<?php }?>
</div>

  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="Child_vaccination_program"){?>
  <?php if(isset($_GET['do2']) && $_GET['do2']=="delete"){
  $sql="delete from child_vaccination_program where vaccine_name='".$_GET['vaccine_name']."'";
  $res=$config -> query($sql);
 }?>      
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
  $query = mysqli_query($config,"select * from child_vaccination_program where child_name like '%$searchq%' or child_serial_num like '%$searchq%' or vaccine_name like '%$searchq%' or visit_date like '%$searchq%' or lot_no like '%$searchq%' or vaccinator_name like '%$searchq%'") or die("could not search!");
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
 <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <thead> 
 <tr>
 <td style="border:1px solid #000;" align="center">ChildName</td>
 <td style="border:1px solid #000;" align="center">SerialNum.</td>
 <td style="border:1px solid #000;" align="center">VaccinName</td>
 <td style="border:1px solid #000;" align="center">Date of vaccine</td>
 <td style="border:1px solid #000;" align="center">Lot.No.</td>
 <td style="border:1px solid #000;" align="center">VaccinatorName</td>
 <td style="border:1px solid #000;" align="center">Delete</td>
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
 <td  align="center" style="border:1px solid #000;" width="100px;">
  <input type="text" name="vaccine_name" value="<?php echo $row['vaccine_name'];?>" style="width:100px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="vaccine_date" value="<?php echo $row['vaccine_date'];?>" style="width:80px; height:25px;"/></td>
 <td  align="center" style="border:1px solid #000;" width="80px;">
  <input type="text" name="lot_no" value="<?php echo $row['lot_no'];?>" style="width:80px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="vaccinator_name" value="<?php echo $row['vaccinator_name'];?>" style="width:50px; height:25px;"/></td> 
 <td style="border:1px solid #000;" align="center" width="50px;" class="input">
  <a href="?do=Child_vaccination_program&do2=delete&child_serial_num=<?php echo $row["child_serial_num"]; ?>" style="text-decoration:none;">Delete</a></td>  
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table>

 <br>
 <br>
    <form method="post" action="">
      <p><input type="text" name="mother_name" placeholder="Mother Name">
        <input type="text" name="mom_id" placeholder="Mother ID"></p>
    <p><input type="text" name="name" value="" placeholder="Child Name">
      <input type="text" name="serial_num" value="" placeholder="Child Serial Num."></p>
    <p>Vaccine Name:<select name="vaccine_name">
      <option value="BCG">BCG</option>
      <option value="Hepatities B1">Hepatities B1</option>
      <option value="IPV">IPV1</option>
      <option value="Hepatities B2">Hepatities B2</option>
      <option value="IPV2">IPV2</option>
      <option value="OPV1">OPV1</option>
      <option value="DBT1">DBT1</option>
      <option value="Hib1">Hib1</option> 
      <option value="OPV2">OPV2</option>  
      <option value="DBT2">DBT2</option>
      <option value="Hib2">Hib2</option>
      <option value="OPV3">OPV3</option>  
      <option value="DBT3">DBT3</option>
      <option value="Hib3">Hib3</option>
      <option value="Hepatities B3">Hepatities B3</option>  
      <option value="Measles">Measles</option>
      <option value="OPV4">OPV4</option>
      <option value="DBT4">DBT4</option>
      <option value="MMR">MMR</option>
    </select></p>
    <p>Child Birth Date<input type="Date" name="B_Date" value="" placeholder="B. Date"></p>
    <p>Vaccine Date<input type="Date" name="vaccine_date" value="" placeholder="Date"></p>
    <p><input type="text" name="lot_no" value="" placeholder="Lot. No.">
     <input type="text" name="vaccinator_name" value="" placeholder="Vaccinator Name"></p>
          <p class="submit" style="float:left">
            <input type="submit" name="addVaccine" value="Add Vaccine">
      </p><br>
<br>
<br>
<br>
<p>
<?php  if(isset($_POST["addVaccine"])){
        $sql="insert into child_vaccination_program values('".$_POST["mother_name"]."','".$_POST["mom_id"]."'
        ,'".$_POST["name"]."','".$_POST["serial_num"]."','".$_POST["vaccine_name"]."'
        ,'".$_POST["B_Date"]."','".$_POST["vaccine_date"]."','".$_POST["lot_no"]."','".$_POST["vaccinator_name"]."')";   
        $res=$config -> query($sql)or die("This user is already exist!");
       }?>         
</p>
</form>          
      </div><br><br>
     
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
 <td style="border:1px solid #000;" align="center">Delete</td>
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
 <td style="border:1px solid #000;" align="center" width="50px;" class="input">
  <a href="?do=Child_vaccination_program&do2=delete2&child_serial_num=<?php echo $row["child_serial_num"]; ?>" style="text-decoration:none;">Delete</a></td>  
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table>
  <?php if(isset($_GET['do2']) && $_GET['do2']=="delete2"){
  $sql="delete from school_vaccination_program where child_serial_num='".$_GET['child_serial_num']."'";
  $res=$config -> query($sql);
 }?> 
 <br>
 <br>
    <form method="post" action="">
      <p><input type="text" name="mother_name" placeholder="Mother Name">
        <input type="text" name="mom_id" placeholder="Mother ID"></p>      
    <p><input type="text" name="name" value="" placeholder="Child Name">
      <input type="text" name="serial_num" value="" placeholder="Child Serial Num."></p>
    <p>Vaccine Name:<select name="vaccine_name">
      <option value="DT">DT</option>
      <option value="OPV5">OPV</option>
      <option value="dT">dT</option>   
    </select></p>
      <p>Date<input type="Date" name="visit_date" value="" placeholder="Date"></p>
    <p><input type="text" name="lot_no" value="" placeholder="Lot. No.">
     <input type="text" name="vaccinator_name" value="" placeholder="Vaccinator Name"></p>
          <p class="submit" style="float:left">
            <input type="submit" name="addVaccine2" value="Add Vaccine">
      </p><br>
<br>
<br>
<br>
<p>
<?php  if(isset($_POST["addVaccine2"])){
        $sql="insert into school_vaccination_program values('".$_POST["mother_name"]."','".$_POST["mom_id"]."'
        ,'".$_POST["name"]."','".$_POST["serial_num"]."','".$_POST["vaccine_name"]."'
        ,'".$_POST["visit_date"]."','".$_POST["lot_no"]."','".$_POST["vaccinator_name"]."')";   
        $res=$config -> query($sql)or die("This user is already exist!");
       }?>         
</p>
</form>          
      </div><br><br>

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
  $query = mysqli_query($config,"select * from child_preventive_examinations where child_name like '%$searchq%' or serial_num like '%$searchq%' or examination_name like '%$searchq%' or visit_date like '%$searchq%'") 
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
 <td style="border:1px solid #000;" align="center">Delete</td>
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
 <td style="border:1px solid #000;" align="center" width="50px;" class="input">
  <a href="?do=child_preventive_examinations&do2=delete2&serial_num=<?php echo $row["serial_num"]; ?>" 
    style="text-decoration:none;">Delete</a></td>  
 </form>
 </tr>
 <?php }while($row=$res -> fetch_assoc());?>

 </table>
  <?php if(isset($_GET['do2']) && $_GET['do2']=="delete2"){
  $sql="delete from child_preventive_examinations where serial_num='".$_GET['serial_num']."'";
  $res=$config -> query($sql);
 }?> 
 <br>
 <br>
    <form method="post" action="">
    <p><input type="text" name="mom_id" placeholder="Mother ID">
      <input type="text" name="name" value="" placeholder="Child Name">
      <input type="text" name="serial_num" value="" placeholder="Child Serial Num."></p>
    <p>Examination Name:<select name="examination_name">
      <option value="PKU">PKU</option>
      <option value="TSH">TSH</option>  
      <option value="Hb">Hb</option>
      <option value="others">others</option> 
    </select></p>
      <p>Date<input type="Date" name="visit_date" value="" placeholder="Date"></p>
    <p><input type="text" name="result" value="" placeholder="result"></p>
          <p class="submit" style="float:left">
            <input type="submit" name="addExamination" value="Add Examination">
      </p><br>
<br>
<br>
<br>
<p>
<?php  if(isset($_POST["addExamination"])){
        $sql="insert into child_preventive_examinations values('".$_POST["name"]."','".$_POST["serial_num"]."'
        ,'".$_POST["mom_id"]."','".$_POST["examination_name"]."','".$_POST["visit_date"]."','".$_POST["result"]."')";   
        $res=$config -> query($sql)or die("This user is already exist!");
       }?>         
</p>
</form>
  </div>
<?php }?>  

  <div>
    <?php if (isset($_GET['do']) && $_GET['do']=="Newborn_Assesment"){?>
<form method="post" action="" id="form" style="width:1000px;">
   <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Newborn Assesment</legend><hr>
      <table>
        <tr>
          <td>Child name:</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td>Child Serial Number:</td>
          <td><input type="text" name="serial_num"></td>
        </tr> 
        <tr>
          <td>Mom ID:</td>
          <td><input type="text" name="mom_id"></td>
        </tr>       
         <tr>
            <td>Mode of delivery: </td>
            <td><select name="mode_of_delivery">
               <option value=Vaginal  selected>Vaginal</option>
                 <option value=C.S >C.S</option>
            </select></td>
         </tr>
         <tr>
            <td>Date Of Birth: </td>
            <td><input type="Date" name="bdate"></td>
         </tr>
         <tr>
            <td>Birth Weight in gr.: </td>
            <td><input type="text" name="wt1"></td>
         </tr>
         <tr>
            <td>Gestational age at delivery: </td>
            <td><input type="text" name="age"></td>
         </tr>  
         <tr>
            <td>Temperature in C.: </td>
            <td><input type="text" name="temp"></td>
         </tr> 
         <tr>
            <td>Pulse (/min): </td>
            <td><input type="text" name="pulse"></td>
         </tr> 
         <tr>
            <td>Respiratory Rate (/min): </td>
            <td><input type="text" name="resp_rate"></td>
         </tr> 
         <tr>
            <td>Weight in gr.: </td>
            <td><input type="text" name="wt2"></td>
         </tr>  
         <tr>
            <td>Length in cm.: </td>
            <td><input type="text" name="length"></td>
         </tr>
         <tr>
            <td>Head Circumfrance in cm.: </td>
            <td><input type="text" name="HC"></td>
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
            <td>Congenital Malfomation:</td>
            <td>
                <input type="radio" id="yes" name="Congenital_Malfomation" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="Congenital_Malfomation" value="no">
                  <label for="no">No</label>
                  <input type="radio" id="referred" name="Congenital_Malfomation" value="referred"> 
                  <label for="referred">Referred</label>            
            </td>
         </tr> 
         <tr>
            <td>Jaundice:</td>
            <td>
                <input type="radio" id="yes" name="Jaundice" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="Jaundice" value="no">
                  <label for="no">No</label>
                  <input type="radio" id="referred" name="Jaundice" value="referred"> 
                  <label for="referred">Referred</label>            
            </td>
         </tr>
         <tr>
            <td>Cyanosis:</td>
            <td>
                <input type="radio" id="yes" name="Cyanosis" value="yes">
                  <label for="yes">Yes</label>
                  <input type="radio" id="no" name="Cyanosis" value="no">
                  <label for="no">No</label>
                  <input type="radio" id="referred" name="Cyanosis" value="referred"> 
                  <label for="referred">Referred</label>            
            </td>
         </tr> 
         <tr>
            <td>Umbilical Stump:</td>
            <td>
                <input type="radio" id="clean" name="Umbilical_Stump" value="clean">
                  <label for="clean">Clean</label>
                  <input type="radio" id="infected" name="Umbilical_Stump" value="infected">
                  <label for="infected">No</label>
                  <input type="radio" id="referred" name="Umbilical_Stump" value="referred"> 
                  <label for="referred">Referred</label>            
            </td>
         </tr> 
         <tr>
            <td>Feeding:</td>
            <td>
                <input type="radio" id="mixed" name="Feeding" value="mixed">
                  <label for="mixed">Mixed</label>
                  <input type="radio" id="artifical" name="Feeding" value="artifical">
                  <label for="artifical">Artifical</label>
                  <input type="radio" id="exclusive" name="Feeding" value="exclusive"> 
                  <label for="exclusive">Exclusive</label>            
            </td>
         </tr>
         <tr>
            <td>Remarks: </td>
            <td><input type="text" name="Remarks"></td>
         </tr>
         <tr>
            <td>Doctor Name: </td>
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
            <td><input type="submit" value="Save"  name="save"></td>
         </tr>                  
      </table>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into newborn_assessment values('".$_POST["name"]."','".$_POST["serial_num"]."','".$_POST["mom_id"]."'
       ,'".$_POST["mode_of_delivery"]."','".$_POST["bdate"]."','".$_POST["wt1"]."','".$_POST["age"]."','".$_POST["temp"]."'
       ,'".$_POST["pulse"]."','".$_POST["resp_rate"]."','".$_POST["wt2"]."','".$_POST["length"]."','".$_POST["HC"]."'
       ,'".$_POST["gender"]."','".$_POST["Congenital_Malfomation"]."','".$_POST["Jaundice"]."','".$_POST["Cyanosis"]."'
       ,'".$_POST["Umbilical_Stump"]."','".$_POST["Feeding"]."','".$_POST["Remarks"]."','".$_POST["doctor_name"]."'
       ,'".$_POST["doctor_id"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?></p>    
</form>      
  </div>
<?php }?>  
  
  <div>
    <?php if(isset($_GET['do']) && $_GET['do']=="child_followUp_referred"){?>
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
 <td style="border:1px solid #000;" align="center">DoctorName</td>
 <td style="border:1px solid #000;" align="center">DoctorID</td>
 </tr>
 </thead>
 <?php
  $sql="select * from child_followup_referred order by child_serial_num asc";
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
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="doctor_name" value="<?php echo $row['doctor_name'];?>" style="width:50px; height:25px;"/></td> 
 <td  align="center" style="border:1px solid #000;" width="50px;">
  <input type="text" name="doctor_id" value="<?php echo $row['doctor_id'];?>" style="width:50px; height:25px;"/></td>           
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
              <td><input type="text" name="mom_id"></td>
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
 <?php if(isset($_GET['do']) && $_GET['do']=="Manage_Users"){?>
  <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Add/Delete Users</legend><hr>
  <?php if(isset($_GET['do2']) && $_GET['do2']=="delete_user"){
  $sql="delete from users where id='".$_GET['id']."'";
  $res=$config -> query($sql);
 }
 ?>

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
  $query = mysqli_query($config,"select * from users where id like '%$searchq%' or name like '%$searchq%' or type like '%$searchq%'") 
  or die("could not search!");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    $output = 'There was no search results!';
  }else{
    while ($row = mysqli_fetch_array($query)) {
      $id = $row['id'];
      $name = $row['name'];
      $pass = $row['pass'];
      $type = $row['type'];

      $output .= '<div style="border: #cfcfcf solid 2px;">'.' id= '.$id.' ,name= '.$name.' ,pass= '.$pass.' ,type= '.$type.'</div>'; 
    }
  }
 }
 print("$output");
 ?>
<br>
<hr>
 <table border="3" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000; background:#EFF4F7;">
 <tr>
 <td style="border:1px solid #000;" align="center">UserId</td>
 <td style="border:1px solid #000;" align="center">UserName</td>
 <td style="border:1px solid #000;" align="center">UserPassword</td>
 <td style="border:1px solid #000;" align="center">UserType</td>
 <td style="border:1px solid #000;" align="center">Delete</td>
 </tr>
 
 <?php
  $sql="select * from users order by id asc";
        $res=$config -> query($sql)or die($config -> error);
        $row=$res -> fetch_assoc();
  do{?>
  <tr>
 <td  align="center" style="border:1px solid #000;" width="50px">
  <input type="text" name="id" value="<?php echo $row['id'];?>" style="width:50px; height:25px;" disabled/></td> 
 <td  align="center" style="border:1px solid #000;" width="250px">
  <input type="text" name="name" value="<?php echo $row['name'];?>" style="width:250px; height:25px;" disabled/></td>
 <td  align="center" style="border:1px solid #000;" width="150px;">
  <input type="text" name="pass" value="<?php echo $row['pass'];?>" style="width:150px; height:25px;" disabled/></td>
 <td  align="center" style="border:1px solid #000;" width="150px;">
  <input type="text" name="type" value="<?php echo $row['type'];?>" style="width:150px; height:25px;" disabled/></td>  
 <td style="border:1px solid #000;" align="center" width="100px;" class="input">
  <a href="?do=Manage_Users&do2=delete_user&id=<?php echo $row["id"]; ?>" style="text-decoration:none;">Delete</a></td>
 
 </tr>
 
 <?php }while($row=$res -> fetch_assoc());?>
 
 
 </table>
 <br>
 <br>
    <form method="post" action="">
    <p><input type="text" name="name" value="" placeholder="Username"></p>
          <p><input type="password" name="password" value="" placeholder="Password"></p>
          <p>
            <select name="type">
            <option name="admin">admin</option>
            <option name="doctor">doctor</option>
            <option name="mother">mother</option>
            </select>
          </p>
          <p class="submit" style="float:left">
            <input type="submit" name="addUsr" value="Add User">
      </p><br>
<br>
<br>
<br>
<p>
<?php  if(isset($_POST["addUsr"])){
        $sql="insert into users values(NULL,'".$_POST["name"]."','".$_POST["password"]."','".$_POST["type"]."')";   
        $res=$config -> query($sql)or die("This user is already exist!");
       }?>         
</p>
</form>
<?php } ?>
</div>

<div>
  <?php if(isset($_GET['do']) && $_GET['do']=="Admin_Info"){?>
    <form method="post" action=""  id="form" style="width:5 00px;">      
     <fieldset>
      <legend style="color:#F7819F ;font-weight:bold;font-size: 18px;">Admin Information</legend><hr>
      <div style="float: left;">
      <table>
         <tr>
            <td>Admin Name:</td>
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
      </div>
   </fieldset>
        <p>
      <?php if(isset($_POST["save"])){
       $sql="insert into admin_info values('".$_SESSION["id"]."','".$_POST["Name"]."','".$_POST["tel"]."','".$_POST["email"]."',
       '".$_POST["city"]."','".$_POST["password"]."')";
        $res=$config -> query($sql)or die($config -> error);
      }
     ?>
     </p>   
    <br>
</form> 
<?php }?>  
</div>
<?php }?>


