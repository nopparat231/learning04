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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.2.1.css">
</head>

<body>

  <?php include 'navbar.php'; ?>

  <div class="py-2">
    <div class="container">
      <div class="row">

        <?php include 'menu.php'; ?>
        <?php include '../conn.php'; ?>

        <?php include 'datatables.php'; ?>

        <body>

          <?php 

          $in = isset($_REQUEST['in']);
          $sh = isset($_REQUEST['showchoice']);
          $shs = isset($_REQUEST['showchoice_s']);
          $sp = isset($_REQUEST['sp']);
          $ep = isset($_REQUEST['ep']);
          $pw = isset($_REQUEST['pw']);
          $su = isset($_REQUEST['su']);
          $eu = isset($_REQUEST['eu']);
          $sc = isset($_REQUEST['sc']);
          $sco = isset($_REQUEST['sco']);
          $send = isset($_REQUEST['send']);

          if ($in <> '') {
            include 'index_scoreall.php';
          }elseif ($sh <> '') {
            include 'showchoice.php';
          }elseif ($shs <> '') {
            include 'showchoice_sub.php';
          }elseif ($sp <> '') {
            include 'editprofile_show.php';
          }elseif ($ep <> '') {
            include 'editprofile.php';
          }elseif ($pw <> '') {
            include 'edit_password.php';
          }elseif ($su <> '') {
            include 'show_user.php';
          }elseif ($eu <> '') {
            include 'edit_user.php';
          }elseif ($sc <> '' or $sco <> '') {
            include 'show_choice_all.php';
          }elseif ($send <> '') {
            include 'send_mail.php';
          }else{ ?>


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
            <br><br><br><br><br><br>
          </div>


          <?php
        }

        ?>

      </div>
    </div>
  </div>
</div>

<?php if ($eu <> ''): ?>


    <?php else: ?>
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
<?php include 'footer_admin.php'; ?>
   
 </body>

 </html>