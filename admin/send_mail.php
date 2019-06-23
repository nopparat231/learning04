
<?php 

$user_id = isset($_GET['user_id']);

$check = "SELECT * FROM user";
$result = mysqli_query($con,$check) or die(mysqli_error());
$num = mysqli_fetch_assoc($result);

?>
<div class="col-md-9 bg-light">
 <div class="py-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center"><b>แจ้งเตือนสมาชิก</b></h1>
        <hr>
      </div>
    </div>
  </div>
</div>
<div class="py-1">
  <div class="container w-46">
    <div class="row">
      <div class="text-left col-md-12" style="">
        <form class="" id="c_form-h" action="send_mail_db.php" method="post" >
          <div class="form-group row">
            <label class="col-3">ข้อความแจ้งเตือน</label>
            <div class="col-9">

        <textarea rows="8" cols="80" required placeholder="กรุณากรอกข้อความ" name="massage"></textarea>

            </div>
            <label class="col-3">ส่งถึง</label>
            <div class="col-9">

              <div class="container">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <button name="m" type="sub" class="btn btn-primary text-light mx-1" >ผู้ใช้งาน</button>
                    <button name="a" type="btn" class="btn btn-primary text-light mx-1" >แอดมิน</button>
                    <button name="am" type="btn" class="btn btn-primary text-light mx-1" >ผู้ใช้งาน & แอดมิน</button>


                  </div>
                </div>
              </div>

            </div>
            
            <label class="col-3"></label>
     


          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<style>
  .footer {
   position: fixed;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
 }
</style>

</body>

</html>
