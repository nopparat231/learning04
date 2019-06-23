
<?php session_start();?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.1.3.css">

  <style>
    /* The container */
    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 15px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
      border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark {
      background-color: #52E678;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
      top: 9px;
      left: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: white;
    }
  </style>


</head>

<?php include 'conn.php'; ?>
<?php 

$choice_id = $_REQUEST['choice_id'];
$user_id = $_REQUEST['user_id'];

$sql="SELECT * From testing WHERE choice_id = '$choice_id' and status <> 1 order by rand() limit 21";
$db_query=mysqli_query($con,$sql) or die(mysqli_error());
$result=mysqli_fetch_array($db_query);

$sqln="SELECT * From choice WHERE choice_id = $choice_id and choice_status <> 1 ";
$db_queryN=mysqli_query($con,$sqln) or die(mysqli_error());
$resultN=mysqli_fetch_array($db_queryN);


?>

<body onload="window.setTimeout(&#39;getSecs()&#39;,1)">
  <?php include 'navbar.php'; ?>

  <?php 

  if (isset($_REQUEST['aff']) && !isset($_REQUEST['af'])) { ?>
    <div style="position: fixed; width: 400px;">
      <form>
        &nbsp;&nbsp;จับเวลาทำแบบทดสอบ : <input size="5" name="timespent" id="time_value" style="border: none;border-bottom: 2px solid red;" />
        <input type="hidden" name="aff" id="ck" value="aff">

      </form>    

    </div>
  <?php } 
  if (isset($_REQUEST['bff'])) { ?>
    <div style="position: fixed; width: 400px;">
      <form>
        &nbsp;&nbsp;จับเวลาทำแบบทดสอบ : <input size="5" name="timespent" id="time_value" style="border: none;border-bottom: 2px solid red;" />
        <input type="hidden" name="aff" id="ck" value="bff">

      </form>    

    </div>
  <?php } ?>
  <div class="container">

    <div class="py-2">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"><b>

              <?php if (isset($_REQUEST['bff'])){ ?>
                แบบทดสอบก่อนเรียน <?php echo $resultN['choice_name']; ?>
              <?php }elseif(isset($_REQUEST['aff'])){ ?>
                แบบทดสอบหลังเรียน <?php echo $resultN['choice_name']; ?>
              <?php }elseif (isset($_REQUEST['af'])) { ?>
                เฉลยแบบทดสอบ <?php echo $resultN['choice_name']; ?>
              <?php } ?>
            </b></h1>
          </div>
        </div>
      </div>
    </div>
    <form name="form1" method="post" action="">
      <div class="py-3" style="">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
              <?php 

              if (isset($_REQUEST['af'])) {
                include 'answer.php';
              }else{

               ?>
               <?php

               $i=0;
               while($result=mysqli_fetch_array($db_query))
               {
                $i++;


                $re = $result['answer'];
                $arran = "answer[$re]";

                ?>

                <input name="id" type="hidden" value="<?php echo $result['id']; ?>">
                <input name="id<?php echo $i;?>" type="hidden" value="<?php echo $result['id']; ?>">
                <h3><?php echo $i." ).   ".$result["question"];?></h3>
                <input type="hidden" name="line" value="<?=$i;?>">

                <ol>

                  <label class="container"><h5><?php echo $result["c1"];?>
                  <input type="radio" name="c<?php echo $i;?>" value="1" required>
                  <span class="checkmark"></span></h5>
                </label>

                <label class="container"><h5><?php echo $result["c2"];?>
                <input type="radio" name="c<?php echo $i;?>" value="2">
                <span class="checkmark"></span></h5>
              </label>

              <label class="container"><h5><?php echo $result["c3"];?>
              <input type="radio" name="c<?php echo $i;?>" value="3">
              <span class="checkmark"></span></h5>

            </label>
            <label class="container"><h5><?php echo $result["c4"];?>
            <input type="radio" name="c<?php echo $i;?>" value="4">
            <span class="checkmark"></span></h5>
          </label>

          <input name="answer<?php echo $i;?>" type="hidden" value="<?php echo $result['answer'];?>">
        </ol>


        <hr>

      <?php } ?>
    <?php   } ?>
  </div>
</div>
</div>
</div>


<input type="hidden" name="choice_id" id="choice_id" value="<?php echo $choice_id ?>">

<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">


<?php if (isset($_REQUEST['aff'])){ ?>
  <input type="hidden" name="af" value="af" />
<?php }elseif(isset($_REQUEST['bff'])){ ?>
 <input type="hidden" name="bf" value="bf" />
<?php } ?>


<div class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <?php if (isset($_REQUEST['af'])) { ?>
         <a href="score.php?user_id=<?php echo $user_id ?>" class="btn btn-secondary" type="button" >ดูคะแนนรวม</a>
       <?php }else{ ?>
         <button class="btn btn-secondary" id="btn1" >ส่งคำตอบ</button>

       <?php   } ?>


     </div>
   </div>
 </div>
</form>

<?php if (isset($_REQUEST['bf'])) {
  bf();
}elseif (isset($_REQUEST['af'])) {

  af();
} ?>

<!-- คำนวนคะแนนก่อนเรียน -->
<?php

function bf(){

  //$user_learning_time_bf = 'ยังไม่ทำ';

  $choice_id = $_REQUEST['choice_id'];
  $user_id = $_REQUEST['user_id'];

  $score =0;


  $line = $_REQUEST['line']+1;
  for ($i=1; $i < $line; $i++) { 


    if($_REQUEST["c$i"] == $_REQUEST["answer$i"])
    {
      $score=$score+1;
    }
  }
  include 'conn.php';
  $sql1 = "UPDATE user_learning SET user_learning_bf = '$score' WHERE choice_id = '$choice_id'";

  $result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error());

//ปิดการเชื่อมต่อ database
  mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม  
  ?>
  <input type="hidden" name="score" id="sc" value="<?php echo $score; ?>">

  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

  <script type="text/javascript">

    var $ws = 'watch.php?choice_id=<?php echo $choice_id ?>&user_id=<?php echo $user_id ?>';

    setTimeout(function () { 
      swal({
        title: "คะแนนก่อนเรียน <?php echo $score ?> คะแนน",

        type: "success",

        confirmButtonText: "รับชมสื่อการเรียนรู้"
      },
      function(isConfirm){
        if (isConfirm) {
          window.location.href = $ws;
        }
      }); }, 50);

    </script>
  <?php } ?>


  <!-- คำนวนคะแนนหลังเรียน -->
  <?php

  function af(){

    //$time = $_REQUEST['timespent'];

    $choice_id = $_REQUEST['choice_id'];
    $user_id = $_REQUEST['user_id'];
    $user_learning_af = $_REQUEST['af'];
    $score =0;


    $line = $_REQUEST['line']+1;
    for ($i=1; $i < $line; $i++) { 


      if($_REQUEST["c$i"] == $_REQUEST["answer$i"])
      {
        $score=$score+1;
      }
    }
    include 'conn.php';

    $sql2 = "UPDATE user_learning SET user_learning_af = $score WHERE user_id = $user_id AND choice_id = $choice_id ";

    $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

//ปิดการเชื่อมต่อ database
    mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
    ?>

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <script type="text/javascript">

      var $ws = '#';

      setTimeout(function () { 
        swal({
          title: "คะแนนหลังเรียน <?php echo $score ?> คะแนน",

          type: "success",

          confirmButtonText: "ดูเฉลย"
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = $ws;
          }
        }); }, 50);

      </script>
    <?php } ?>

    <!--  <button class="btn btn-secondary" onclick="submitForms()" >ส่งคำตอบ</button> -->
  </div>

  <script> 
    startday = new Date();
    clockStart = startday.getTime();
    function initStopwatch() 
    { 
     var myTime = new Date(); 
     var timeNow = myTime.getTime();  
     var timeDiff = timeNow - clockStart; 
     this.diffSecs = timeDiff/1000; 
     return(this.diffSecs); 
   } 
   function getSecs() 
   { 
    var mySecs = initStopwatch(); 
    var mySecs1 = ""+mySecs; 
    mySecs1= mySecs1.substring(0,mySecs1.indexOf(".")) + " วินาที"; 
    document.forms[0].timespent.value = mySecs1 
    window.setTimeout('getSecs()',1000); 
  }

</script>

<script type="text/javascript">

 $(document).ready(function(){

  $("#btn1").click(function(){

    $.post("savetime.php", { 
      data1: $("#time_value").val(), 
      data2: $("#user_id").val(),
      data3: $("#ck").val(),
      data4: $("#sc").val(),
      data5: $("#choice_id").val()});
  });
});
</script>

</body>
<?php include 'footer.php'; ?>
</html>