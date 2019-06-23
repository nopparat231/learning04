
<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

  <title>สื่อแอนิเมชั่น</title>
  <link rel="shortcut icon" href="./img/5.png" />

  <style type="text/css">
    body {
      font-family: 'Prompt', sans-serif;
    }
    
  </style>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12" >
       <?php include 'navbar.php'; ?>
       <?php include 'navbar1.php'; ?>
     </div>
   </div>
 </div>

 <div class="py-2">
  <div class="container">
    <div class="row">

      <?php include 'menu.php'; ?>
      <?php include 'model.php'; ?>

      <?php
      $regis = isset($_GET['register']);
      $learning = isset($_GET['learning']);

      if ($regis <> ''): ?>
       <div class="col-md-9 bg-light">
        <?php include 'register.php'; ?>
      </div>
      <?php elseif ($learning <> ''): ?>
        <div class="col-md-9 bg-light">
          <?php include 'index2.php'; ?>
        </div>
        <?php else: ?>

          <div class="col-md-9 bg-light">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/qllEXQACumc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <br>
            <font color="red">
              <h4 class="">คำแนะนำ </h4>
              <h5>
                <ol class="">
                  <li>ระบบมีมาตราการเพื่อป้องกันข้อมูลส่วนบุคคล ขอให้ท่านได้ศึกษาและปฏิบัติตามขั้นตอนตามลำดับ</li>
                  <li>ท่านต้องลงทะเบียนและใช้รหัสผ่านในการเข้าสู่ระบบ</li>
                  <li>ควรเป็นผู้ทำรายการทุกขั้นตอนด้วยตัวเองและรักษารหัสผ่านเป็นความลับเพื่อป้องกันการแอบอ้างการเข้าสู่ระบบ</li>
                  <li>ผู้ที่ยังไม่สมัครเป็นสมาชิกให้กดปุ่ม สมัครสมาชิก สำหรับผู้ที่สมัครเป็นสมาชิกให้กดปุ่ม เข้าสู่ระบบ เพื่อทำการ Login เข้าสู่ระบบ</li>

                </ol>
              </h5>
            </font>
          </div>

        <?php endif ?>

      </div>
    </div>
  </div>
  <?php
  if ($learning <> ''): ?>
    <style>
      .footer {
       position: fixed;
       bottom: 0;
       width: 100%;
       color: white;
       text-align: center;
     }
   </style>


 <?php endif ?>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <?php include 'footer.php'; ?>

</body>

</html>