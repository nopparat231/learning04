<?php 

ini_set('error_reporting', 0);
ini_set('display_errors', 0);

if(session_status() == PHP_SESSION_NONE){
    //session has not started
  session_start();
}

if (isset($_SESSION["UserID"])) {
    header('Location: index1.php');
    exit;
  }
  
?>

<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>


<div class="container">
 <div class="row">

  <div class="col-md-6"> <!-- ใส่วิดีโอตัวอย่าง -->
    <br><br>
    <img src="img/img47.jpg" align="center" width="100%" height="77%">
    <br>
  </div>

  <div class="col-md-6" >
    <br>
    <h3 class="text-center">สมัครสมาชิก</h3>
    <form class="" id="c_form-h" action="register_db.php" method="post">
      <div class="form-group row"><label class="col-2 col-form-label">ชื่อผู้ใช้</label>
        <div class="col-10">
          <div class="input-group">
            <input type="text" name="Username" class="form-control" id="input-user" required placeholder="กรุณากรอกชื่อผู้ใช้" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="3" maxlength="25" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="user();" autocomplete="off" >

          </div>
        </div>
      </div>
      <div class="form-group row"> 
        <label for="inputpasswordh" class="col-2 col-form-label">รหัสผ่าน<br></label>
        <div class="col-10">
          <input type="password" name="Password" id="txtNewPassword" class="form-control" id="inputpasswordh" required placeholder="รหัสผ่านต้องมี ตัวใหญ่ ตัวเล็ก ตัวเลข อย่างน้อย 8 ตัวขึ้นไป" title="รหัสผ่านต้องมี ภาษาอังกฤษตัวใหญ่ ตัวเล็ก ตัวเลข 8 ตัวขึ้นไป"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="25" autocomplete="off" >
          <span id="result"></span>
        </div>

      </div> 

      <div class="form-group row">
       <label for="inputpasswordh" class="col-2 col-form-label text-nowrap">ยืนยันรหัส<br></label>
       <div class="col-10">
        <input type="password" id="txtConfirmPassword" onkeyup="checkPasswordMatch();" required class="form-control" id="inputpasswordh" title="รหัสผ่านต้องมี ภาษาอังกฤษตัวใหญ่ ตัวเล็ก ตัวเลข 8 ตัวขึ้นไป"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="กรุณากรอกยืนยันรหัสผ่าน" minlength="6" maxlength="25"  >
        <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>

      </div>
    </div>
    <div class="form-group row"><label class="col-2">ชื่อ</label>
      <div class="col-10">
        <div class="input-group">
          <input type="text" name="Firstname" class="form-control"  required="กรุณากรอกชื่อ" placeholder="กรุณากรอกชื่อ" onkeyup="validate();" minlength="3" maxlength="25"  title="ใส่ ก-ฮ หรือ a-z อย่างน้อย 3 ตัว"></div>

        </div>
      </div>
      <div class="form-group row"><label class="col-2">นามสกุล</label>
        <div class="col-10">
          <div class="input-group">
            <input type="text" name="Lastname" class="form-control"  required="กรุณากรอกนามสกุล อย่างน้อย 3 ตัว" placeholder="กรุณากรอกนามสกุล" onkeyup="validate();" minlength="3" maxlength="25"  title="ใส่ ก-ฮ หรือ a-z อย่างน้อย 3 ตัว"></div>

          </div>
        </div>
        <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">อีเมล์</label>
          <div class="col-10">
            <input type="email" name="email" class="form-control" id="inputmailh" required="กรุณากรอกอีเมล์" placeholder="กรุณากรอกอีเมล์" title="กรุณาใช้ อีเมล์ ที่ใช้งานได้จริง">

          </div>
        </div>
        <div class="form-group row">
          <label class="col-2">เบอร์โทร<br></label>
          <div class="col-10">
            <div class="input-group">
              <input name="phone" class="form-control" id="input-num" required="กรุณากรอกเบอร์โทร" placeholder="กรุณากรอกเบอร์โทร" value="" size="10" title="เบอร์โทร 0-9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
              type="tel"
              maxlength = "10" onkeyup="num();"></div>

            </div>
          </div>

          <div class="py-1">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center">

                  <button name="btn" class="btn btn-xs btn-danger" style="background-color: #FED497;" >
                    <font color="#0000" size="4"><b>สมัครสมาชิก</b></font></button>
                    <!-- <a class="btn btn-danger text-light mx-1" href="index.php">ยกเลิก</a> -->
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>

    <?php include 'footer.php'; ?>

    </html>


    <script type="text/javascript">

      function validate() {
        var element = document.getElementById('input-field');
        element.value = element.value.replace(/[^a-zA-Zก-๙ @]+/, '');
      };

      function num() {
        var element = document.getElementById('input-num');
        element.value = element.value.replace(/[^0-9]+/, '');
      };

      function user() {
        var element = document.getElementById('input-user');
        element.value = element.value.replace(/[^a-zA-Z0-9]+/, '');
      };
    </script>

    <script type="text/javascript">
      function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        if (password != confirmPassword)
          $("#divCheckPasswordMatch").html("รหัสผ่านไม่ตรงกัน!");
        else
          $("#divCheckPasswordMatch").html("รหัสผ่านตรงกัน");
      }

          /*
  jQuery document ready.
  */
  $(document).ready(function()
  {
  /*
    assigning keyup event to password field
    so everytime user type code will execute
    */

    $('#txtNewPassword').keyup(function()
    {
      $('#result').html(checkStrength($('#txtNewPassword').val()))
    })  

  /*
    checkStrength is function which will do the 
    main password strength checking for us
    */

    function checkStrength(password)
    {
    //initial strength
    var strength = 0
    
    //if the password length is less than 6, return message.
    if (password.length < 6) { 
      $('#result').removeClass()
      $('#result').addClass('short')
      return 'รหัสสั้นเกินไป' 
    }
    
    //length is ok, lets continue.
    
    //if length is 8 characters or more, increase strength value
    if (password.length > 7) strength += 1

    //if password contains both lower and uppercase characters, increase strength value
  if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1

    //if it has numbers and characters, increase strength value
  if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 

    //if it has one special character, increase strength value
  if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1

    //if it has two special characters, increase strength value
  if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1

    //now we have calculated strength value, we can return messages

    //if value is less than 2
    if (strength < 2 )
    {
      $('#result').removeClass()
      $('#result').addClass('weak')
      return 'รหัสง่ายเกินไป'     
    }
    else if (strength == 2 )
    {
      $('#result').removeClass()
      $('#result').addClass('good')
      return 'รหัสปลอดภัย'   
    }
    else
    {
      $('#result').removeClass()
      $('#result').addClass('strong')
      return 'รหัสปลอดภัยมาก'
    }
  }
});

</script>