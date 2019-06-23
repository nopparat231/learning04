
 <?php// include 'checkLogin.php'; ?>
 <nav class="navbar navbar-expand-md bg-light navbar-light">
  <div class="container"> 
    <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar12"> 
      <a class="navbar-brand d-none d-md-block" href="#">
        <i class="fa d-inline fa-lg fa-circle"></i>
        <b>Home</b>
      </a>

      <?php if (isset($_SESSION["Userlevel"]) == "M") { ?>
        <?php $user_id=$_SESSION['UserID']; ?>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> 
            <a class="nav-link" href="index1.php">บทเรียน</a> </li>
            <li class="nav-item dropdown"> 
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ข้อมูลผู้ใช้</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="score.php?user_id=<?php echo $user_id; ?>">คะแนนผู้ใช้</a>
                <a class="dropdown-item" href="editprofile.php?user_id=<?php echo $user_id; ?>">แก้ไขข้อมูล</a>

              </div>
            </li>
          </ul>

        <?php }else{ ?>

         <ul class="navbar-nav mx-auto">
          <li class="nav-item"> 
            <a class="nav-link" href="#"></a> </li>
            <li class="nav-item dropdown"> 

            </li>
          </ul>

        <?php }?>



        <ul class="navbar-nav ">
          <li class="nav-item "> 
            <?php if (isset($_SESSION["Userlevel"]) == "M") { 

              echo "<b class='fa text-primary nav-link' >".$_SESSION["User"]."</b>";
            }else{ ?>



            <?php    }

            ?>

          </li>
          <li class="nav-item">  
            <?php

            if (isset($_SESSION["Userlevel"]) == "M") {
              echo "<a class='fa text-danger nav-link' href='logout.php'>ออกจากระบบ</a>";

            }else{?>

              <form class="form-inline" action="login_db.php"> 
                <input class="form-control mr-sm-2" type="text" placeholder="ชื่อผู้ใช้" id="Username" name="Username" required="required">
                <input class="form-control mr-sm-2" type="Password" placeholder="รหัสผ่าน" id="Password"  name="Password" required="required"> 
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">เข้าสู่ระบบ</button>
                <a class='nav-link text-lite' href='index.php' data-toggle='modal' data-target='#exampleModal'>ลืมรหัสผ่าน</a>
                <!-- <a href="resetpassword.php" type="submit" class="form-control mr-sm-2">ลืมรหัสผ่าน</a> -->
              </form>

              <?php
            }
            ?> 

          </li>
          <?php include 'resetpassword.php'; ?>
        </ul>
      </div>
    </div>
  </nav>